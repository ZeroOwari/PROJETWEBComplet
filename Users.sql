# Privilèges pour `TOtime`@`%`

GRANT ALL PRIVILEGES ON *.* TO `TOtime`@`%` IDENTIFIED BY PASSWORD '*73FE0D954B4FCFAFEC03D434950435535041EDE0' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `web4all`.* TO `TOtime`@`%` WITH GRANT OPTION;


# Privilèges pour `website_user`@`localhost`

GRANT SELECT, INSERT, UPDATE ON *.* TO `website_user`@`localhost` IDENTIFIED BY PASSWORD '*387AA830C07E3807696436074388D93B4822BDC6' WITH MAX_QUERIES_PER_HOUR 100 MAX_UPDATES_PER_HOUR 100 MAX_CONNECTIONS_PER_HOUR 100 MAX_USER_CONNECTIONS 20;

GRANT SELECT, INSERT, UPDATE ON `your_database`.* TO `website_user`@`localhost`;
