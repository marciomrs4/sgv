echo "Digite o nome do Arquivo de Backup"
read arquivo

mysqldump -uroot -p -e --databases sgv -r $arquivo.sql
