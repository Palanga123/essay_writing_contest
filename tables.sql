create table admin(
	admin_id int primary key auto_increment,
    fname varchar(255),
    lname varchar(255),
    contact varchar(255),
    password varchar(255)
);

create table users(
	user_id int primary key auto_increment,
    fname varchar(255),
    lname varchar(255),
    contact varchar(255),
    exam_number int(12),
    grade int,
    gender varchar(255),
    password varchar(255)
);
create table files(
    files_id int primary key auto_increment,
    user_id int,
    question varchar(255),
    file_1 varchar(255),
    file_2 varchar(255),
    file_3 varchar(255),
    marked_status varchar(255),
    foreign key (user_id) references users(user_id)
);
create table scores(
    scores_id int primary key auto_increment,
    user_id int,
    score int,
    foreign key (user_id) references users(user_id)
);