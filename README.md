# SMS PAN

Envio de mensagens em massa (SMS) via modem GSM

# DOCKER
Para iniciar subir apenas a imagem do apache2 e phpmyadmin :

cd laradock

docker-compose up -d apache2 phpmyadmin

#MODEM GSM

Instalar GAMMU 

sudo apt-get install gammu

sudo apt-get install gammu-smsd gammu

Consifurar gammu :

sudo nano /etc/gammu-smsdrc

#Copie e cole:

[gammu]
port = /dev/ttyUSB0
connection = at
// Debugging
logformat = textall

//SMSD configuration, see gammu-smsdrc(5)
[smsd]
PIN = 3636
service = sql
driver = native_mysql
logfile = /var/log/smsd
host = chatbox.cxeefirnfcvu.us-east-2.rds.amazonaws.com
user = admin
password = 12345678
database = smspan_db


