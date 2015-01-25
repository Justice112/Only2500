use ExamDB;

alter table courses add (exam_time int ,selection_number int);

alter table exams drop exam_time;

alter table exam_student_ships add (status bool default false,
									left_time int );

create table if not exists selection_student_ships
(
	id int primary key auto_increment,
	selection_id int,
	answer  varchar(2),
	exam_student_ship_id int
);
drop table exam_selection_ships;