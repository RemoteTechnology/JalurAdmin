--
-- PostgreSQL database dump
--

-- Dumped from database version 13.13
-- Dumped by pg_dump version 13.13

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: billings; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.billings (id, record_id, user_id, status, record_date, payments, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: glampings; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.glampings (id, name, description, image, date, "time", created_at, updated_at) FROM stdin;
1	Поездка на луга	Посидим, чайку попьём, потреним, не обламывайся!	uploads/glamping.jpg	2024-11-09	07:14:00	2024-03-04 09:16:05	2024-03-04 09:16:05
2	Благословление гор	Посидим в горах, подышим	uploads/glamping.jpg	2024-05-05	09:00:00	2024-03-04 09:16:05	2024-03-04 09:16:05
3	Копание картошки	Целых 3 дня, 15 га и нам ни кто не помешает!	uploads/glamping.jpg	2024-01-09	08:50:00	2024-03-04 09:16:05	2024-03-04 09:16:05
\.


--
-- Data for Name: halls; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.halls (id, name, addres, description, start_work_time, end_work_time, created_at, updated_at) FROM stdin;
1	Зал на Волочаевской	Волочаевская 2а, П-3, этаж 2	Чистый комфортный зал.	09:00:00	22:00:00	2024-03-04 09:14:33	2024-03-04 09:14:33
2	Зал на Маркса	Проспект Маркса 113, этаж 1	Чистый комфортный зал.	08:00:00	20:00:00	2024-03-04 09:14:33	2024-03-04 09:14:33
3	Зал на сухом логу	Сухой Лог 15, этаж 6	Чистый комфортный зал.	07:30:00	22:00:00	2024-03-04 09:14:33	2024-03-04 09:14:33
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.migrations (id, migration, batch) FROM stdin;
55	2014_10_12_000000_create_users_table	1
56	2014_10_12_100000_create_password_reset_tokens_table	1
57	2019_08_19_000000_create_failed_jobs_table	1
58	2019_12_14_000001_create_personal_access_tokens_table	1
59	2023_12_30_122856_create_type_workouts_table	1
60	2023_12_30_123634_create_workouts_table	1
61	2023_12_30_124308_create_schedule_times_table	1
62	2023_12_30_124403_create_halls_table	1
63	2023_12_30_124454_create_glampings_table	1
64	2023_12_30_124652_create_schedules_table	1
65	2023_12_30_124958_create_records_table	1
66	2024_01_18_104051_create_user_targets_table	1
67	2024_01_19_131102_create_billings_table	1
68	2024_03_02_085045_create_workout_visitions_table	1
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: schedule_times; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.schedule_times (id, start_time, created_at, updated_at) FROM stdin;
1	09:00:00	2024-03-04 09:14:47	2024-03-04 09:14:47
2	10:40:00	2024-03-04 09:14:47	2024-03-04 09:14:47
3	11:30:00	2024-03-04 09:14:47	2024-03-04 09:14:47
4	11:45:00	2024-03-04 09:14:47	2024-03-04 09:14:47
5	12:50:00	2024-03-04 09:14:47	2024-03-04 09:14:47
6	16:00:00	2024-03-04 09:14:47	2024-03-04 09:14:47
7	17:30:00	2024-03-04 09:14:47	2024-03-04 09:14:47
8	18:20:00	2024-03-04 09:14:47	2024-03-04 09:14:47
9	20:50:00	2024-03-04 09:14:47	2024-03-04 09:14:47
\.


--
-- Data for Name: type_workouts; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.type_workouts (id, name, created_at, updated_at) FROM stdin;
1	Хатха-Йога	2024-03-04 09:14:08	2024-03-04 09:14:08
2	Расслабончик	2024-03-04 09:14:09	2024-03-04 09:14:09
3	Заруба	2024-03-04 09:14:09	2024-03-04 09:14:09
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.users (id, first_name, last_name, middle_name, age, birth_date, role, gender, image, description, weight, height, size_cloth, phone, email, code, password_admin, remember_token, created_at, updated_at) FROM stdin;
1	Гарри	Причёскин	Фенвентиляторович	19	2001-11-09	Администратор	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-01	test.user.1@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
2	Лола	Кукурузова	\N	22	2001-11-09	Тренер	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-02	test.user.2@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
3	Борис	Огурцов	Утюгинасов	25	2001-11-09	Тренер	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-03	test.user.3@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
4	Марго	Лягушкина	\N	19	2001-11-09	Руководитель	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-04	test.user.4@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
5	Денис	Шоколадкин	Микроволнович	31	2001-11-09	Клиент-менеджер	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-05	test.user.5@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
6	Клавдия	Карамелькина	Тостеровна	21	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-06	test.user.6@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
7	Рудольф	Вафелькин	\N	23	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-07	test.user.7@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
8	Виолетта	Трюфелина	Утюгинасовна	28	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-08	test.user.8@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
9	Артур	Лимонадов	Лампочкин	21	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-09	test.user.9@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
10	Инга	Печенькина	\N	17	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-10	test.user.10@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
11	Оливер	Чупа-Чупсов	\N	22	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-11	test.user.11@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
12	Розалия	Попкорнина	\N	34	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-12	test.user.12@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
13	Григорий	Бубликов	\N	27	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-13	test.user.13@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
14	Лолита	Сникерсова	\N	37	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-14	test.user.14@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
15	Феликс	Шариков	\N	31	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-15	test.user.15@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
16	Валентина	Пончикова	Фенхозяйкаевна	22	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-16	test.user.16@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
17	Фёдор	Молочников	Миксерович	19	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-17	test.user.17@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
18	Луиза	Помидорова	Пылесосовна	25	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-18	test.user.18@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
19	Игорь	Картофелин	Блендерович	30	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-19	test.user.19@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
20	Анжелика	Кексына	Утюжиловна	28	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-20	test.user.20@email.ru	\N	\N	\N	2024-03-04 09:13:56	2024-03-04 09:13:56
21	Вячеслав	Миронов	\N	\N	\N	Администратор	Мужчина	\N	\N	\N	\N	\N	+7 (999) 999-99-99	\N	\N	$2y$12$knIzQVY6ODHFD3GXn1L8h.a6tj/fPrFc2F4fteW.wpMFEzdbl0P0G	\N	2024-03-04 16:21:28	2024-03-04 16:21:28
\.


--
-- Data for Name: workouts; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.workouts (id, type_workout_id, name, description, image, created_at, updated_at) FROM stdin;
2	1	Пробуждающая йога	Тут должно быть описание...	uploads/ioga.jpg	2024-03-04 09:15:16	2024-03-04 09:15:16
3	2	Лежание на иглах	Тут должно быть описание...	uploads/ioga.jpg	2024-03-04 09:15:16	2024-03-04 09:15:16
4	3	Все против всех	Тут должно быть описание...	uploads/ioga.jpg	2024-03-04 09:15:16	2024-03-04 09:15:16
1	1	Йога для гибкости тела 2	Тут должно быть описание без хуйни.	uploads/ioga.jpg	2024-03-04 09:15:16	2024-03-06 04:32:18
\.


--
-- Data for Name: schedules; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.schedules (id, hall_id, workout_id, couch_id, schedule_time_id, date, count_record, created_at, updated_at) FROM stdin;
1	1	2	3	1	2024-06-03 00:00:00	15	2024-03-04 09:17:44	2024-03-04 09:17:44
2	1	3	3	3	2024-06-03 00:00:00	15	2024-03-04 09:17:44	2024-03-04 09:17:44
3	1	1	2	1	2024-06-03 00:00:00	10	2024-03-04 09:17:44	2024-03-04 09:17:44
4	2	1	2	4	2024-06-03 00:00:00	14	2024-03-04 09:17:44	2024-03-04 09:17:44
5	2	3	3	3	2024-07-03 00:00:00	12	2024-03-04 09:17:44	2024-03-04 09:17:44
6	2	1	2	1	2024-07-03 00:00:00	10	2024-03-04 09:17:44	2024-03-04 09:17:44
7	1	1	2	4	2024-07-03 00:00:00	14	2024-03-04 09:17:44	2024-03-04 09:17:44
8	1	3	3	3	2024-08-03 00:00:00	12	2024-03-04 09:17:44	2024-03-04 09:17:44
9	1	1	2	1	2024-08-03 00:00:00	10	2024-03-04 09:17:44	2024-03-04 09:17:44
10	2	1	2	4	2024-08-03 00:00:00	14	2024-03-04 09:17:44	2024-03-04 09:17:44
\.


--
-- Data for Name: records; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.records (id, contract, user_id, schedule_id, total_training, remaining_training, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: user_targets; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.user_targets (id, user_id, collection, created_at, updated_at) FROM stdin;
1	6	Хочу машину!	2024-03-04 16:38:08	2024-03-04 16:38:08
2	10	Хочу похудеть!	2024-03-04 16:38:08	2024-03-04 16:38:08
3	11	Хочу чай!	2024-03-04 16:38:08	2024-03-04 16:38:08
4	12	Хочу гречку!	2024-03-04 16:38:08	2024-03-04 16:38:08
5	13	Ну шоб эта девки сматрели!	2024-03-04 16:38:08	2024-03-04 16:38:08
6	17	Похудеть!	2024-03-04 16:38:08	2024-03-04 16:38:08
7	20	Что б эта больше двигаца!	2024-03-04 16:38:08	2024-03-04 16:38:08
8	19	Хочу в туалет!	2024-03-04 16:38:08	2024-03-04 16:38:08
\.


--
-- Data for Name: workout_visitions; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.workout_visitions (id, contract_id, visition_date, status, created_at, updated_at) FROM stdin;
\.


--
-- Name: billings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.billings_id_seq', 1, false);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: glampings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.glampings_id_seq', 3, true);


--
-- Name: halls_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.halls_id_seq', 3, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.migrations_id_seq', 68, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: records_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.records_id_seq', 1, true);


--
-- Name: schedule_times_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.schedule_times_id_seq', 9, true);


--
-- Name: schedules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.schedules_id_seq', 10, true);


--
-- Name: type_workouts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.type_workouts_id_seq', 3, true);


--
-- Name: user_targets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.user_targets_id_seq', 8, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.users_id_seq', 21, true);


--
-- Name: workout_visitions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.workout_visitions_id_seq', 1, false);


--
-- Name: workouts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.workouts_id_seq', 4, true);


--
-- PostgreSQL database dump complete
--

