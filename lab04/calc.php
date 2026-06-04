<?php
declare(strict_types=1);

$expression = trim($_POST['expr'] ?? '');
if ($expression === '') {
    redirectWithError('Пустое выражение');
}
if (!preg_match('/^[0-9+\-*\/().\s]+$/', $expression)) {
    redirectWithError('Недопустимые символы в выражении');
}

$tokens = tokenize($expression);
$position = 0;
$value = parseExpression($tokens, $position);

if ($position !== count($tokens)) {
    redirectWithError('Синтаксическая ошибка');
}
if (!is_finite($value)) {
    redirectWithError('Математическая ошибка');
}

$result = rtrim(rtrim(number_format($value, 10, '.', ''), '0'), '.');
header('Location: index.php?expr=' . urlencode($expression) . '&result=' . urlencode($result));
exit;

function tokenize(string $source): array
{
    $tokens = [];
    $length = strlen($source);
    for ($i = 0; $i < $length;) {
        if (ctype_space($source[$i])) {
            $i++;
            continue;
        }
        if (ctype_digit($source[$i]) || $source[$i] === '.') {
            $number = '';
            while ($i < $length && (ctype_digit($source[$i]) || $source[$i] === '.')) {
                $number .= $source[$i++];
            }
            $tokens[] = ['number', (float)$number];
            continue;
        }
        $tokens[] = ['operator', $source[$i++]];
    }
    return $tokens;
}

function parseExpression(array &$tokens, int &$position): float
{
    $value = parseTerm($tokens, $position);
    while (isset($tokens[$position]) && in_array($tokens[$position][1], ['+', '-'], true)) {
        $operator = $tokens[$position++][1];
        $right = parseTerm($tokens, $position);
        $value = $operator === '+' ? $value + $right : $value - $right;
    }
    return $value;
}

function parseTerm(array &$tokens, int &$position): float
{
    $value = parseFactor($tokens, $position);
    while (isset($tokens[$position]) && in_array($tokens[$position][1], ['*', '/'], true)) {
        $operator = $tokens[$position++][1];
        $right = parseFactor($tokens, $position);
        if ($operator === '/' && $right == 0.0) {
            redirectWithError('Деление на ноль');
        }
        $value = $operator === '*' ? $value * $right : $value / $right;
    }
    return $value;
}

function parseFactor(array &$tokens, int &$position): float
{
    if (!isset($tokens[$position])) {
        redirectWithError('Неполное выражение');
    }
    if ($tokens[$position] === ['operator', '-']) {
        $position++;
        return -parseFactor($tokens, $position);
    }
    if ($tokens[$position][0] === 'number') {
        return $tokens[$position++][1];
    }
    if ($tokens[$position] === ['operator', '(']) {
        $position++;
        $value = parseExpression($tokens, $position);
        if (!isset($tokens[$position]) || $tokens[$position] !== ['operator', ')']) {
            redirectWithError('Не закрыта скобка');
        }
        $position++;
        return $value;
    }
    redirectWithError('Ошибка в выражении');
}

function redirectWithError(string $message): never
{
    header('Location: index.php?error=1&result=' . urlencode($message));
    exit;
}
