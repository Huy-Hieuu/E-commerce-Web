<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$port = '4306';

$conn = mysqli_connect($servername, $username, $password,'', $port);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn -> query("drop database if exists onlinestore");
$conn -> query("create database onlinestore");
$conn -> query("use onlinestore");
$conn -> query("drop table if exists product");
$conn -> query("drop table if exists products");
$conn -> query("create table product(productID int not null AUTO_INCREMENT,
                                    productName varchar(255) not null,
                                    price float(5) not null,
                                    popularity int not null,
                                    productImage longblob not null,
                                    constraint pk_product primary key(productID))"
                                    );

$conn -> query('drop table if exists user');
$conn -> query('create table user(userID int not null auto_increment,
                                  username varchar(255) not null,    
                                  email varchar(255) not null unique,
                                  password varchar(255) not null,
                                  level varchar(255),
                                  constraint pk_user primary key(userID))'  
                                  );
$conn -> query('drop trigger if exists user_level');
$conn -> query('create trigger user_level 
                before insert on user
                for each row
                  begin
                    if new.level is null then
                      set new.level = "customer";
                    end if;
                  end
              ');
$conn -> query('insert into user(username, email, password, level) 
                values("Huy Hieu","huyhieu@gmail.com",sha1("123123"),"manager")');

$conn->close();

?>