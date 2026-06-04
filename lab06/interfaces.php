<?php
interface Sender
{
    public function send(string $message): string;
}
class EmailSender implements Sender
{
    public function send(string $message): string { return 'E-mail: ' . $message; }
}
class SmsSender implements Sender
{
    public function send(string $message): string { return 'SMS: ' . $message; }
}
$senders = [new EmailSender(), new SmsSender()];
?>
<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Интерфейсы</title><link rel="stylesheet" href="styles.css"></head><body><div class="shell"><header class="topbar"><a class="btn secondary" href="index.php">← назад</a><div><h1>Интерфейсы</h1><p>Лабораторная №6</p></div></header><main class="panel"><?php foreach ($senders as $sender): ?><div class="result"><?= htmlspecialchars($sender->send('работа отправлена студентом Сиддикова А. М.')) ?></div><?php endforeach; ?></main></div></body></html>
