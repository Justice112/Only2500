#考试系统   Examnation
drop database if exists ExamDB;
create database if not exists ExamDB;
use ExamDB;
create table if not exists admins
(
	id int primary key auto_increment,
	name varchar(40),
	password varchar(40)
);
insert into `admins` values (1,'admin','admin');
#
create table  if not exists grades
(
	id int primary key auto_increment,
	name varchar(40)
);
create table  if not exists classrooms
(
	id int primary key auto_increment,
	name varchar(40),
	grade_id int 
);
create table  if not exists teachers
(
	id int primary key auto_increment,
	name varchar(40),
	username varchar(40),
	password varchar(40)
);
create table  if not exists students
(
	id int primary key auto_increment,
	name varchar(40), 
	number varchar(40),
	password varchar(40),
	classroom_id int ,
	grade_id int
);
create table  if not exists courses
(
	id int primary key auto_increment,
	name varchar(40),
	exam_time int,
	selection_number int,
	open_score bool
);
create table  if not exists selections
(
	id int primary key auto_increment,
	topic varchar(255),
	picture varchar(40),
	optionA varchar(255),
	optionB varchar(255),
	optionC varchar(255),
	optionD varchar(255),
	answer varchar(2),
	course_id int 
);
create table  if not exists exams
(
	id int primary key auto_increment,
	type varchar(40),
	teacher_id int ,
	course_id int ,
	exam_date date
);
create table  if not exists exam_student_ships
(
	id int primary key auto_increment,
	exam_id int,
	student_id int,
	grade  int,
	left_time int,
	status bool default false
);
create table  if not exists selection_student_ships
(	
	id int primary key auto_increment,
	selection_id int,
	answer  varchar(2),
	exam_student_ship_id int
);
create table  if not exists course_teacher_ships
(
	id int primary key auto_increment,
	course_id int,
	teacher_id int
);

