       	   
	create database Private123 character set utf8 collate utf8_general_ci;
	
	use private123;   
			
		create table news(
			news_id				INT             PRIMARY KEY AUTO_INCREMENT,
			news_title			VARCHAR(32)     NOT NULL,
			news_text			TEXT            NOT NULL,
			news_date			DATE            NOT NULL,
			photo	        	VARCHAR(128)		
			);
			
		create table employee(
			employee_id			INT             PRIMARY KEY AUTO_INCREMENT,
			firstname			VARCHAR(32)     NOT NULL,
			lastname			VARCHAR(32)     NOT NULL,
			fathername			VARCHAR(32)     NOT NULL,
			gender				BOOLEAN         NOT NULL,
			photo				VARCHAR(128)    NOT NULL,
			phone				CHAR(10)        NOT NULL UNIQUE,
			email				VARCHAR(128)    UNIQUE,
			address				VARCHAR(255)    NOT NULL,
			education			VARCHAR(32)     NOT NULL,
			position			VARCHAR(64)     NOT NULL,	
			employee_type		BOOLEAN         NOT NULL,
			gross_salary		INT             NOT NULL,	
			currency			CHAR(3)         NOT NULL,
			working_hours		VARCHAR(32)     NOT NULL,
			hire_date			DATE            NOT NULL,		
			retire_date			DATE
			);
		create table employee_achievement(		
			achievement_id		INT             PRIMARY KEY AUTO_INCREMENT,
			employee_id			INT             NOT NULL ,
			ach_title			VARCHAR(128)     NOT NULL,
			ach_text			TEXT            NOT NULL,
			ach_date			DATE            NOT NULL,
			ach_type            VARCHAR(32)             ,
			CONSTRAINT employee_employee_achievement_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE NO ACTION ON UPDATE CASCADE 
		);
		create table users(
			user_id				INT             PRIMARY KEY AUTO_INCREMENT,
			employee_id			INT             NOT NULL UNIQUE ,
			username			VARCHAR(32)     NOT NULL UNIQUE ,
			password			VARCHAR(64)     NOT NULL,
			admin_level			TINYINT         NOT NULL DEFAULT 0,
			employee_level		TINYINT         NOT NULL DEFAULT 0,
			teacher_level		TINYINT         NOT NULL DEFAULT 0,
			student_level		TINYINT         NOT NULL DEFAULT 0,
			finance_level		TINYINT         NOT NULL DEFAULT 0,
			inventory_level		TINYINT         NOT NULL DEFAULT 0,
			library_level		TINYINT         NOT NULL DEFAULT 0,
			laboratoar_level	TINYINT         NOT NULL DEFAULT 0,
			CONSTRAINT employee_users_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
		);
		create table emp_attendance(		
			employee_id		  	 INT             ,
			absent_year		  	 YEAR           ,
			absent_month	     INT          ,
			absent_day			 TINYINT            ,
			absent_hour	         TINYINT        NOT NULL,
			absent_type 	     VARCHAR(32)    NOT NULL,
			CONSTRAINT emp_attendance_pk PRIMARY KEY (employee_id, absent_year, absent_month, absent_day),
			CONSTRAINT employee_emp_attendance_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
			);
		create table emp_overtime(	
			employee_id			INT              ,
			overtime_year		INT            ,
			overtime_month		INT			 ,
			overtime_day   		TINYINT  			 ,
			overtime_hour		TINYINT			NOT NULL,
			CONSTRAINT emp_overtime_pk PRIMARY KEY (employee_id, overtime_year, overtime_month, overtime_day),
			CONSTRAINT employee_emp_overtime_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE 
		);
		
		create table emp_salary(
			employee_id			INT			    ,
			salary_year			YEAR			,
			salary_month		INT 				,		 
			absent_amount		INT 			NOT NULL DEFAULT 0,
			overtime_amount     INT			    NOT NULL DEFAULT 0 ,
			tax_amount			INT             NOT NULL DEFAULT 0,
			net_salary			INT             NOT NULL,
			exchange_rate		FLOAT         NOT NULL,	
			changed_amount		INT             NOT NULL, 
			payment_date		DATE,
			CONSTRAINT emp_salary_pk PRIMARY KEY (employee_id, salary_year, salary_month),
			CONSTRAINT employee_emp_salary_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE NO ACTION ON UPDATE CASCADE
			);
		create table emp_resign(
			resign_id			INT       		PRIMARY KEY AUTO_INCREMENT,
			employee_id			INT 			NOT NULL ,
			resign_date			DATE  			NOT NULL,
			resign_reason		VARCHAR(128)            NOT NULL,
			CONSTRAINT employee_emp_resign_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
		);
		
		create table classes(
			class_id		  INT    			PRIMARY KEY AUTO_INCREMENT,
			class_name		  VARCHAR(32)		NOT NULL,
			section_name	  VARCHAR(32)               ,
			fees			  INT               NOT NULL
			);
			
		create table subject(
			subject_id		  INT 			   PRIMARY KEY AUTO_INCREMENT,
			subject_name	  VARCHAR(32)      NOT NULL,
			class_id		  INT              ,
			CONSTRAINT classes_subject_fk FOREIGN KEY (class_id) REFERENCES classes (class_id) ON DELETE CASCADE ON UPDATE CASCADE
			);  
			
		create table subject_teach(	
			subject_id		  INT               ,
			teacher_id		  INT               ,
			teach_year		  YEAR              ,
			CONSTRAINT subject_teach_pk PRIMARY KEY (subject_id, teacher_id, teach_year),
			CONSTRAINT subject_subject_teach_fk FOREIGN KEY (subject_id) REFERENCES subject (subject_id) ON DELETE CASCADE ON UPDATE CASCADE,
			CONSTRAINT teacher_subject_teach_fk FOREIGN KEY (teacher_id) REFERENCES employee (employee_id)ON DELETE NO ACTION ON UPDATE CASCADE
		);
		
		create table student(
			student_id		  INT		       PRIMARY KEY AUTO_INCREMENT,
			firstname		  VARCHAR(30)      NOT NULL,
			lastname			  int              NOT NULL UNIQUE,
			fathername		  VARCHAR(32)	   NOT NULL,
			grandfathername	  VARCHAR(32)	   NOT NULL,
			gender			  BOOLEAN	   	   NOT NULL,
			province		  VARCHAR(32)	   NOT NULL, 
			district	      VARCHAR(32)      NOT NULL,
			village				VARCHAR(32)    NOT NULL,
			birth_year			DATE           NOT NULL,
			nic					INT        NOT NULL UNIQUE,
			class_id			INT            NOT NULL ,

			CONSTRAINT classes_student_fk FOREIGN KEY (class_id) REFERENCES classes (class_id) ON DELETE NO ACTION ON UPDATE CASCADE
		);
		
		create table lib_member(	
			member_id 			INT		     	PRIMARY KEY AUTO_INCREMENT,
			student_id			INT 			NOT NULL UNIQUE ,
			reg_date			DATE			NOT NULL,
			CONSTRAINT student_lib_member_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE CASCADE ON UPDATE CASCADE
		);
		create table lib_book(
			book_id				INT 			PRIMARY KEY AUTO_INCREMENT,
			isbn				VARCHAR(64)             ,
			book_name			VARCHAR(64)     NOT NULL,
			author				VARCHAR(64)     NOT NULL,
			edition				VARCHAR(32)             ,
			category			VARCHAR(32)     NOT NULL
			);
			
		create table lib_loan(
			loan_id			   INT   		    PRIMARY KEY AUTO_INCREMENT,
			student_id		   INT 				NOT NULL ,
			book_id			   INT 				NOT NULL ,
			loan_date		   DATE 		    NOT NULL,
			return_date		   DATE 		        	,
			surcharge	       INT 	,
			CONSTRAINT student_lib_loan_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE CASCADE ON UPDATE CASCADE,
			CONSTRAINT lib_book_lib_loan_fk FOREIGN KEY (book_id) REFERENCES lib_book (book_id) ON DELETE CASCADE ON UPDATE CASCADE
		);
		
		
		create table student_achievement(		
			achievement_id		INT            PRIMARY KEY AUTO_INCREMENT,
			student_id			INT            NOT NULL ,
			ach_title			VARCHAR(128)    NOT NULL	,	
			ach_text			TEXT           NOT NULL,
			ach_date			DATE           NOT NULL,
			ach_type			VARCHAR(32)    NOT NULL	,
			CONSTRAINT student_student_achievement_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE 
			);	
			
		create table student_relative(
			relative_id			INT 		  PRIMARY KEY AUTO_INCREMENT,
			student_id			INT        	  NOT NULL ,
			relative_name		VARCHAR(32)	  NOT NULL,
			relative_relation	VARCHAR(32)	  NOT NULL,
			relative_job		VARCHAR(32)	  NOT NULL,		
			relative_phone		CHAR(10)	,
			CONSTRAINT student_student_relative_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE
		);
		
		create table student_attendance(		
			student_id		  	 INT             ,
			absent_year		  	 INT           ,
			absent_month	     INT          ,
			absent_day			 TINYINT            ,
			absent_hour	         TINYINT        NOT NULL,
			CONSTRAINT student_attendance_pk PRIMARY KEY (student_id, absent_year, absent_month, absent_day),
			CONSTRAINT student_student_attendance_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE CASCADE ON UPDATE CASCADE
			);
			
		create table exam(
			exam_id				INT	          PRIMARY KEY AUTO_INCREMENT,
			exam_title			VARCHAR(32)   NOT NULL,
			exam_type			VARCHAR(32)   NOT NULL,
			exam_date			DATE 	      NOT NULL,
			subject_id			INT	          NOT NULL ,
			teacher_id			INT 	      NOT NULL ,
			CONSTRAINT subject_exam_fk FOREIGN KEY (subject_id) REFERENCES subject (subject_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT teacher_exam_fk FOREIGN KEY (teacher_id) REFERENCES employee (employee_id) ON DELETE NO ACTION ON UPDATE CASCADE
			);	
				
		create table score(
			exam_id				INT 	      ,
			student_id			INT 	     	,
			written_mark		TINYINT      NOT NULL DEFAULT 0,
			oral_mark			TINYINT	     NOT NULL DEFAULT 0,
			class_activity		TINYINT	     NOT NULL DEFAULT 0,
			homework			TINYINT	     NOT NULL DEFAULT 0,
			final_mark			TINYINT	     NOT NULL,
			remark              TEXT ,
			CONSTRAINT score_pk PRIMARY KEY (student_id, exam_id),
			CONSTRAINT exam_score_fk FOREIGN KEY (exam_id) REFERENCES exam (exam_id) ON DELETE CASCADE ON UPDATE CASCADE,
			CONSTRAINT student_score_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE
			);
			
		create table student_transfer(
			transfer_id			INT          PRIMARY KEY AUTO_INCREMENT,
			student_id			INT          NOT NULL ,
			transfer_date		DATE         NOT NULL, 
			from_school			VARCHAR(64)  NOT NULL, 
			to_school			VARCHAR(64)  NOT NULL, 
			class_id			INT          NOT NULL ,
			grade				TINYINT              ,
			remark			    TEXT                 ,
			CONSTRAINT student_student_transfer_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT classes_student_transfer_fk FOREIGN KEY (class_id) REFERENCES classes (class_id) ON DELETE NO ACTION ON UPDATE CASCADE
			
		);
		
		create table student_fee(
			fee_id				INT          PRIMARY KEY AUTO_INCREMENT,
			student_id			INT          NOT NULL ,
			fee_month			INT        NOT NULL,
			class_id			INT          NOT NULL ,
			fee_amount			INT          NOT NULL,
			discount			INT          NOT NULL DEFAULT 0,
			paid_amount			INT          NOT NULL,
			paid_year			YEAR         NOT NULL,
			paid_month			INT        NOT NULL,
			paid_day			TINYINT          NOT NULL,
			CONSTRAINT student_student_fee_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT classes_student_fee_fk FOREIGN KEY (class_id) REFERENCES classes (class_id) ON DELETE NO ACTION ON UPDATE CASCADE
              );
			  
		create table income_type(
			type_id				INT          PRIMARY KEY AUTO_INCREMENT,
			type_name			VARCHAR(32)  NOT NULL UNIQUE -- (admission, exam_fine, transport, book_sales, uniform_sales) 
			);
			
		create table income(
			income_id			INT          PRIMARY KEY AUTO_INCREMENT,
			income_Date			YEAR         NOT NULL,
			type_id				INT          ,
			income_amount		INT          NOT NULL,	
			student_id			INT          NOT NULL ,
			class_id			INT          NOT NULL ,
			CONSTRAINT income_type_income_fk FOREIGN KEY (type_id) REFERENCES income_type (type_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT student_income_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT classes_income_fk FOREIGN KEY (class_id) REFERENCES classes (class_id) ON DELETE NO ACTION ON UPDATE CASCADE
			);
			
			
		create table expense_type(
			type_id				INT           PRIMARY KEY AUTO_INCREMENT,
			type_name			VARCHAR(32)   NOT NULL UNIQUE
			);
			
	   create table expense(
			expense_id			INT 					PRIMARY KEY AUTO_INCREMENT,
			employee_id	  	 	INT 					,
			type_id				INT 					,
			expense_year		YEAR 					NOT NULL,
			amount				INT 					NOT NULL,	
			remark				TEXT ,
			CONSTRAINT expense_type_expense_fk FOREIGN KEY (type_id) REFERENCES expense_type (type_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT employee_expense_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE NO ACTION ON UPDATE CASCADE
		);
		
		create table stock(
			item_id				INT 					PRIMARY KEY AUTO_INCREMENT,
			item_name			VARCHAR(64)				NOT NULL UNIQUE,
			quantity			INT 					NOT NULL,
			price				INT 					NOT NULL
		);
			
		create table stock_in(
			in_id				INT 					PRIMARY KEY AUTO_INCREMENT,
			item_id				INT 					NOT NULL ,
			source				VARCHAR(64) 			NOT NULL,
			in_date				DATE 					NOT NULL,
			quantity			INT 					NOT NULL,
			remark				TEXT ,
			CONSTRAINT stock_stock_in_fk FOREIGN KEY (item_id) REFERENCES stock (item_id) ON DELETE NO ACTION ON UPDATE CASCADE
		);
		
		create table stock_out(
			out_id				INT 				  	PRIMARY KEY AUTO_INCREMENT,
			item_id				INT 					NOT NULL ,
			student_id			INT 					NOT NULL ,
			out_date			DATE					NOT NULL,
			quantity			INT 					NOT NULL,
			remark				TEXT ,
			CONSTRAINT stock_stock_out_fk FOREIGN KEY (item_id) REFERENCES stock (item_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT student_stock_out_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE
			
		);
			
		create table lab(	
			lab_id				INT 					PRIMARY KEY AUTO_INCREMENT,
			item_name			VARCHAR(32)				NOT NULL UNIQUE,
			unit				VARCHAR(32),
			description			VARCHAR(128)			NOT NULL,	
			quantity			INT 					NOT NULL,
			remark				TEXT                             
		);

		create table lab_out(
			lab_out_id			INT 				   	PRIMARY KEY AUTO_INCREMENT,
			class_id			INT 				   	NOT NULL ,
			experiment_date		DATE 				   	NOT NULL,
			teacher_id			INT 				   	NOT NULL ,
			experiment_title	VARCHAR(128)  			NOT NULL,
			experiment_goal		VARCHAR(128) 			NOT NULL,
			lab_id				INT 					NOT NULL ,
			used_quantity		INT 			NOT NULL,
			damaged_quantity	INT 					NOT NULL,
			experiment_result	VARCHAR(128)			NOT NULL,
			CONSTRAINT classes_lab_out_fk FOREIGN KEY (class_id) REFERENCES classes (class_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT teacher_lab_out_fk FOREIGN KEY (teacher_id) REFERENCES employee (employee_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT lab_lab_out_fk FOREIGN KEY (lab_id) REFERENCES lab (lab_id) ON DELETE NO ACTION ON UPDATE CASCADE
		);
		
		create table student_transport(
			transport_id		INT          			PRIMARY KEY AUTO_INCREMENT,
			student_id			INT 	                NOT NULL ,
			class_id			INT 					NOT NULL ,
			date_year			YEAR					NOT NULL,
			transport_fee		INT						NOT NULL,   
			car_information		VARCHAR(255)			NOT NULL,
			CONSTRAINT student_student_transport_fk FOREIGN KEY (student_id) REFERENCES student (student_id) ON DELETE NO ACTION ON UPDATE CASCADE,
			CONSTRAINT classes_student_transport_fk FOREIGN KEY (class_id) REFERENCES classes (class_id) ON DELETE NO ACTION ON UPDATE CASCADE
		);
		