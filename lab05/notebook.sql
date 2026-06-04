CREATE TABLE notebook (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(120) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  email VARCHAR(120) NOT NULL,
  note TEXT
);

INSERT INTO notebook (name, phone, email, note) VALUES
('Сиддикова А. М.', '+7 900 000-00-00', 'siddikova@example.com', 'Учебная запись'),
('Учебный отдел', '+7 495 000-00-00', 'study@example.com', 'Контакт для проверки работы');
