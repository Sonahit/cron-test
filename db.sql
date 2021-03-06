CREATE TABLE IF NOT EXISTS books (
	id SMALLINT NOT NULL,
	name VARCHAR(255) NOT NULL,
	author_id SMALLINT NOT NULL,
	genre_id SMALLINT NOT NULL,
	description TEXT NOT NULL,
	publication_date DATE NOT NULL,
	price NUMERIC(7,2) NOT NULL,
	image VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS authors (
	id SMALLINT NOT NULL,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS genres (
	id SMALLINT NOT NULL,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO books (id, name, author_id, genre_id, description, publication_date, price, image) VALUES
	(1,"Война и мир",3,1,"Главная тема — историческая судьба русского народа в Отечественной войне 1812 года. В романе выведено более 550 персонажей, как вымышленных, так и исторических. Лучших своих героев Л. Н. Толстой изображает во всей их душевной сложности, в непрерывных поисках истины, в стремлении к самосовершенствованию. Таковы князь Андрей, граф Николай, граф Пьер, княжны Наташа и Марья. Отрицательные герои лишены развития, динамики, движений души: Элен, Анатоль.","1869-05-02",1500.2,"1.jpg"),
	(2,"Краткая история времени",2,2,"В книге рассказывается о появлении Вселенной, о природе пространства и времени, чёрных дырах, теории суперструн и о некоторых математических проблемах, однако на страницах издания можно встретить лишь одну формулу E=mc². Книга с момента выхода стала бестселлером, так как написана живым языком и рассчитана на обыкновенного читателя.","2010-01-06",1400.03,"2.jpg"),
	(3,"Алиса в Зазеркалье",1,3,"Книгу предваряет шахматная диаграмма, запись сюжета с использованием элементов шахматной нотации и список персонажей, которые представлены в качестве белых и чёрных фигур.","1871-02-03",1300,"3.jpg"),
	(4,"Божественная комедия",4,4,"Согласно католической традиции, загробный мир состоит из ада, куда попадают навеки осуждённые грешники, чистилища — местопребывания искупающих свои грехи грешников, и рая — обители блаженных. Данте детализирует это представление и описывает устройство загробного мира, с графической определённостью фиксируя все детали его архитектоники.","1472-07-06",1899.99,"4.jpg"),
	(5,"Путешествие к центру Земли",5,5,"1863 год. Профессор минералогии из Гамбурга Отто Лиденброк находит в случайно приобретенной им старинной рукописи, содержащей сочинение исландского скальда XIII века Снорри Стурлусона «Круг Земной», зашифрованный манускрипт. Его юный племянник и ассистент Аксель помогает ему прочитать зашифрованное сообщение из прошлого, автором которого является исландский алхимик XVI века Арне Сакнуссем. В нём утверждается, что существует возможность «достигнуть центра Земли» через кратер исландского вулкана Снайфедльс. Профессор, его племянник Аксель и нанятый в Исландии проводник Ганс отправляются в недра земли, не подозревая, какие приключения ожидают их.","1864-02-08",1799.49,"5.jpg"),
	(6,"Над пропастью во ржи",6,1,"Роман написан от лица семнадцатилетнего Холдена Колфилда, находящегося на лечении в клинике: он рассказывает об истории, случившейся с ним прошлой зимой и предшествовавшей его болезни. События, о которых он повествует, разворачиваются в предрождественские дни декабря 1949 года. Воспоминания юноши начинаются со дня его отбытия из закрытой школы Пэнси, откуда он был отчислен за неуспеваемость.","1951-07-16",1500.5,"6.jpg"),
	(7,"Двери восприятия",7,6,"Эссе написано в форме воспоминания Хаксли о своих ощущениях после приёма приблизительно 0,4 грамма мескалина в 11:00 одним из майских дней 1953 года. Оно начинается с краткого обзора истории открытия и изучения мескалина и некоторых сходных по своему действию галлюциногенов.","1954-12-07",1401.51,"7.jpg"),
	(8,"Фауст",8,7,"Трагедия начинается с не имеющего отношения к основному сюжету спора между директором театра и поэтом о том, как надо писать пьесу. В этом споре директор разъясняет поэту, что зритель груб, бестолков и не имеет собственного мнения, предпочитая судить о произведении с чужих слов. Да и не всегда его интересует искусство — некоторые приходят на представление лишь для того, чтобы щегольнуть своим нарядом. Таким образом, пытаться создать великое произведение не имеет смысла, поскольку зритель в массе своей не в состоянии его оценить. Вместо этого следует свалить в кучу всё, что попадётся под руку, а так как зритель всё равно не оценит обилия мысли — удивить его отсутствием связи в изложении.","1832-05-01",1380,"8.jpg"),
	(9,"Так говорил Заратустра",9,8,"Роман состоит из четырёх частей, каждая из которых содержит притчи на различные морально-нравственные и философские темы.","1883-08-10",1801.9,"9.jpg"),
	(10,"Происхождение видов",10,9,"Научная работа Чарльза Дарвина, опубликованная 24 ноября 1859 года, которая считается основой эволюционной биологии. Книга Дарвина представила научную теорию, согласно которой популяция эволюционирует на протяжении поколений в процессе естественного отбора.","1859-11-24",1555.55,"10.jpg");

INSERT INTO authors (id, name) VALUES
	(1, "Льюис Кэрролл"),
	(2, "Стивен Хокинг"),
	(3, "Лев Николаевич Толстой"),
	(4, "Данте Алигьери"),
	(5, "Жюль Верн"),
	(6, "Джером Сэлинджер"),
	(7, "Олдос Хаксли"),
	(8, "Иоганн Вольфганг Гёте"),
	(9, "Фридрих Ницше"),
	(10, "Чарльз Дарвин");
	
INSERT INTO genres (id, name) VALUES
	(1, "Роман"),
	(2, "Научно-популярная литература"),
	(3, "Детская литература"),
	(4, "Поэма"),
	(5, "Научная фантастика"),
	(6, "Эссе"),
	(7, "Трагедия"),
	(8, "Философский роман"),
	(9, "Научная публицистика");
