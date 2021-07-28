# SMS PAN

Envio de mensagens em massa (SMS) via modem GSM

# DOCKER
Para iniciar subir apenas a imagem do apache2 e phpmyadmin :

cd laradock

docker-compose up -d apache2 phpmyadmin

# MODEM GSM

Instalar GAMMU 

sudo apt-get install gammu

sudo apt-get install gammu-smsd gammu

Consifurar gammu :

sudo nano /etc/gammu-smsdrc

# Copie e cole:

[gammu]

port = /dev/ttyUSB0

connection = at

// Debugging

logformat = textall

//SMSD configuration, see gammu-smsdrc

[smsd]

PIN = 3636

service = sql

driver = native_mysql

logfile = /var/log/smsd

host = chatbox.cxeefirnfcvu.us-east-2.rds.amazonaws.com

user = admin

password = 12345678

database = smspan_db


# ERROS 

Erro Bad-setting

sudo sed -i 's|${CMAKE_INSTALL_FULL_BINDIR}|/usr/bin|g' /lib/systemd/system/gammu-smsd.service

sudo systemctl daemon-reload
sudo systemctl restart gammu-smsd


Não conecta : 

sudo systemctl daemon-reload
sudo systemctl restart gammu-smsd

Erro Serviço desconhecido : 

RunOnFailure = /var/spool/gammu/on-error.sh

/var/spool/gammu/on-error.sh :

#!/bin/bash
mv /var/spool/gammu/outbox/$1 /var/spool/gammu/error



# MODIFICAÇÔES

Tabela "outbox" campo "multipart" para varchar(6) e valor padrão para 0.
E adicionar gatilhos : 

CREATE TRIGGER MultiPartBugFix BEFORE INSERT ON outbox
FOR EACH ROW
BEGIN
IF NEW.MultiPart = "FALSE" THEN
SET NEW.MultiPart = 0;
ELSEIF NEW.MultiPart = "TRUE" THEN
SET NEW.MultiPart = 1;
END IF;
END;
