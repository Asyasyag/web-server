CREATE TABLE articles (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(255) NOT NULL,
  text TEXT NOT NULL
);

INSERT INTO articles (name, text) VALUES
('Первая статья', 'Данные статьи хранятся в базе данных.'),
('Редактируемая запись', 'Эту запись можно изменить через форму.'),
('Сведения', 'Работу выполнила Сиддикова А. М., группа 251-321.');
