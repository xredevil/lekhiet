//originthay doi ngay cho nay luon
//origin
bc//lan
2
//conflict
lan nay se khong tot8888888
9999
thu khong commit thu xem
chua get ve ma sua thi se bi conflict nhu the nao?
thay doi
Apache Solr 4.6.1 Tomcat7 Setup on Ubuntu 12.04 ( Simple and Clear Steps )
We need a tomcat server to install and run Apache solr search engine .

Setup Java run time environment by following blog post 

http://gagannaidu.blogspot.in/2013/06/installation-of-oracle-java-7-on-ubuntu.html

Install Tomcat 7 and Solr 4.6
sudo apt-get install tomcat7 tomcat7-admin

Click here to download Solr : http://apache.tradebit.com/pub/lucene/solr/4.6.1/solr-4.6.1.zip

tar zxvf solr-4.6.1.tgz

sudo mv solr-4.6.1 /usr/share/solr

Setup Solr on Tomcat

sudo cp /usr/share/solr/example/webapps/solr.war /usr/share/solr/example/multicore/solr.war 

From the Apache Solr lib, copy all the jar files to the tomcat lib

sudo cp -r solr/example/lib/ext/* /usr/share/tomcat7/lib

sudo cp -r solr/example/resources/log4j.properties /usr/share/tomcat7/lib

Edit /usr/share/tomcat7/lib/log4j.properties and set your log path by setting

solr.log=/usr/share/solr

Now add solr to the Catalina config


cd /etc/tomcat7/Catalina/localhost
sudo gedit solr.xml

add the following to solr.xml

<Context docBase="/usr/share/solr/example/multicore/solr.war" debug="0" crossContext="true">
  <Environment name="solr/home" type="java.lang.String" value="/usr/share/solr/example/multicore" override="true" />
</Context>

Setup Tomcat Manager
sudo gedit /etc/tomcat7/tomcat-users.xml

add the tomcat user within the users block:

<tomcat-users>
  <role rolename="manager-gui"/>
  <user username="giluxe" password="giluxe" roles="manager-gui"/>
</tomcat-users>

sudo chown -R tomcat7 /usr/share/solr/example/multicore

Test tomcat
sudo service tomcat7 restart

Test Solr
Navigate to  http://localhost:8080/solr


Note : If you get any problem while restarting tomcat   " no JDK found - please set JAVA_HOME "
follow this step 

sudo gedit /etc/default/tomcat7  

uncomment JAVA_HOME path . 
http://gagannaidu.blogspot.com/2014/02/apache-solr-461-tomcat7-setup-on-ubuntu.html

------------------------------------------------------------------------------------------------------------------
https://ballo.wordpress.com/2014/11/08/install-tomcat-7-and-solr-4-10-2-on-ubuntu-14-04/
Install Tomcat
sudo apt-get install tomcat7 tomcat7-admin

Download SOLR
di http://mirror.reverse.net/pub/apache/lucene/solr/4.10.2/solr-4.10.2.tgz

tar zxvf solr-4.10.2.tgz
sudo mv solr-4.10.2 /usr/share/solr

Setup Solr
sudo cp /usr/share/solr/example/webapps/solr.war /usr/share/solr/example/multicore/solr.war
sudo cp -r solr/example/lib/ext/* /usr/share/tomcat7/lib
sudo cp -r solr/example/resources/log4j.properties /usr/share/tomcat7/lib

Edit /usr/share/tomcat7/lib/log4j.properties and set your log path by setting
solr.log=/usr/share/solr
Catalina config

cd /etc/tomcat7/Catalina/localhost
sudo gedit solr.xml
add the following to solr.xml
sudo gedit /etc/tomcat7/tomcat-users.xml
add the tomcat user within the users block:

sudo chown -R tomcat7 /usr/share/solr/example/multicore

Test tomcat
sudo service tomcat7 restart

Test Solr
Navigate to http://localhost:8080/solr
