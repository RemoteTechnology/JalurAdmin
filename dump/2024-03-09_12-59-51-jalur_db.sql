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
-- Data for Name: halls; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.halls (id, name, addres, description, start_work_time, end_work_time, created_at, updated_at) FROM stdin;
1	Зал на Волочаевской	Волочаевская 2а, П-3, этаж 2	Чистый комфортный зал.	09:00:00	22:00:00	2024-03-09 10:22:58	2024-03-09 10:22:58
2	Зал на Маркса	Проспект Маркса 113, этаж 1	Чистый комфортный зал.	08:00:00	20:00:00	2024-03-09 10:22:58	2024-03-09 10:22:58
3	Зал на сухом логу	Сухой Лог 15, этаж 6	Чистый комфортный зал.	07:30:00	22:00:00	2024-03-09 10:22:58	2024-03-09 10:22:58
\.


--
-- Data for Name: schedule_times; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.schedule_times (id, start_time, created_at, updated_at) FROM stdin;
1	09:00:00	2024-03-09 10:22:13	2024-03-09 10:22:13
2	10:40:00	2024-03-09 10:22:13	2024-03-09 10:22:13
3	11:30:00	2024-03-09 10:22:13	2024-03-09 10:22:13
4	11:45:00	2024-03-09 10:22:13	2024-03-09 10:22:13
5	12:50:00	2024-03-09 10:22:13	2024-03-09 10:22:13
6	16:00:00	2024-03-09 10:22:13	2024-03-09 10:22:13
7	17:30:00	2024-03-09 10:22:13	2024-03-09 10:22:13
8	18:20:00	2024-03-09 10:22:13	2024-03-09 10:22:13
9	20:50:00	2024-03-09 10:22:13	2024-03-09 10:22:13
\.


--
-- Data for Name: type_workouts; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.type_workouts (id, name, created_at, updated_at) FROM stdin;
1	Хатха-Йога	2024-03-09 10:21:15	2024-03-09 10:21:15
2	Расслабончик	2024-03-09 10:21:15	2024-03-09 10:21:15
3	Заруба	2024-03-09 10:21:15	2024-03-09 10:21:15
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.users (id, first_name, last_name, middle_name, age, birth_date, role, gender, image, description, weight, height, size_cloth, phone, email, code, password_admin, remember_token, created_at, updated_at) FROM stdin;
1	Гарри	Причёскин	Фенвентиляторович	19	2001-11-09	Администратор	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-01	test.user.1@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
2	Лола	Кукурузова	\N	22	2001-11-09	Тренер	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-02	test.user.2@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
3	Борис	Огурцов	Утюгинасов	25	2001-11-09	Тренер	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-03	test.user.3@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
4	Марго	Лягушкина	\N	19	2001-11-09	Руководитель	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-04	test.user.4@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
5	Денис	Шоколадкин	Микроволнович	31	2001-11-09	Клиент-менеджер	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-05	test.user.5@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
6	Клавдия	Карамелькина	Тостеровна	21	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-06	test.user.6@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
7	Рудольф	Вафелькин	\N	23	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-07	test.user.7@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
8	Виолетта	Трюфелина	Утюгинасовна	28	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-08	test.user.8@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
9	Артур	Лимонадов	Лампочкин	21	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-09	test.user.9@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
10	Инга	Печенькина	\N	17	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-10	test.user.10@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
11	Оливер	Чупа-Чупсов	\N	22	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-11	test.user.11@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
12	Розалия	Попкорнина	\N	34	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-12	test.user.12@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
13	Григорий	Бубликов	\N	27	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-13	test.user.13@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
14	Лолита	Сникерсова	\N	37	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-14	test.user.14@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
15	Феликс	Шариков	\N	31	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-15	test.user.15@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
16	Валентина	Пончикова	Фенхозяйкаевна	22	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-16	test.user.16@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
17	Фёдор	Молочников	Миксерович	19	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-17	test.user.17@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
18	Луиза	Помидорова	Пылесосовна	25	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-18	test.user.18@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
19	Игорь	Картофелин	Блендерович	30	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-19	test.user.19@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
20	Анжелика	Кексына	Утюжиловна	28	2001-11-09	Клиент	Мужчина	\N	\N	175	77.6	55	+7 (111) 111-11-20	test.user.20@email.ru	\N	\N	\N	2024-03-09 10:21:00	2024-03-09 10:21:00
21	Овечкин	Миронов	\N	27	\N	Клиент	Мужчина	\N	\N	\N	\N	\N	+7 (999) 999-99-91	\N	\N	\N	\N	2024-03-09 10:39:17	2024-03-09 10:39:17
22	Овечкин	Миронов	\N	27	\N	Клиент	Мужчина	\N	\N	175	65	\N	+7 (999) 999-99-95	\N	$2y$12$hxDcV0tM.xTHUFuNDcC4Je6bEHRAGbwXmxXoHMA0XLllV56hg1Lua	\N	\N	2024-03-09 10:39:46	2024-03-09 11:30:28
\.


--
-- Data for Name: workouts; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.workouts (id, type_workout_id, name, description, image, created_at, updated_at) FROM stdin;
1	1	Йога для тела и ума	Тут должно быть описание...	uploads/ioga.png	2024-03-09 10:21:20	2024-03-09 10:21:20
2	1	Пробуждающая йога	Тут должно быть описание...	uploads/ioga.png	2024-03-09 10:21:20	2024-03-09 10:21:20
3	2	Лежание на иглах	Тут должно быть описание...	uploads/ioga.png	2024-03-09 10:21:20	2024-03-09 10:21:20
4	3	Все против всех	Тут должно быть описание...	uploads/ioga.png	2024-03-09 10:21:20	2024-03-09 10:21:20
\.


--
-- Data for Name: schedules; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.schedules (id, hall_id, workout_id, couch_id, schedule_time_id, date, count_record, created_at, updated_at) FROM stdin;
2	1	2	3	1	2024-06-03 00:00:00	15	2024-03-09 10:23:03	2024-03-09 10:23:03
3	1	3	3	3	2024-06-03 00:00:00	15	2024-03-09 10:23:03	2024-03-09 10:23:03
4	1	1	2	1	2024-06-03 00:00:00	10	2024-03-09 10:23:03	2024-03-09 10:23:03
5	2	1	2	4	2024-06-03 00:00:00	14	2024-03-09 10:23:03	2024-03-09 10:23:03
6	2	3	3	3	2024-07-03 00:00:00	12	2024-03-09 10:23:03	2024-03-09 10:23:03
7	2	1	2	1	2024-07-03 00:00:00	10	2024-03-09 10:23:03	2024-03-09 10:23:03
8	1	1	2	4	2024-07-03 00:00:00	14	2024-03-09 10:23:03	2024-03-09 10:23:03
9	1	3	3	3	2024-08-03 00:00:00	12	2024-03-09 10:23:03	2024-03-09 10:23:03
10	1	1	2	1	2024-08-03 00:00:00	10	2024-03-09 10:23:03	2024-03-09 10:23:03
11	2	1	2	4	2024-08-03 00:00:00	14	2024-03-09 10:23:03	2024-03-09 10:23:03
\.


--
-- Data for Name: records; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.records (id, contract, user_id, schedule_id, total_training, remaining_training, created_at, updated_at) FROM stdin;
1	532174ac-3ec4-45ad-aab4-e0d8aef93054	6	5	10	5	2024-03-09 10:24:06	2024-03-09 10:24:06
2	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	7	5	10	3	2024-03-09 10:24:06	2024-03-09 10:24:06
3	2c10ff5d-b004-476f-9ea0-ddcff57df792	8	5	2	1	2024-03-09 10:24:06	2024-03-09 10:24:06
4	f1c4d552-8fd2-4dcb-95df-9db7aabc32fa	10	6	1	0	2024-03-09 10:24:06	2024-03-09 10:24:06
14	44c5d697-e690-4c1d-9967-e79f3a0b1156	1	2	10	0	2024-03-09 12:17:55	2024-03-09 12:17:55
15	add642ec-e8da-4c7e-b289-ba263f9ec220	1	2	10	8	2024-03-09 12:18:20	2024-03-09 12:53:53
\.


--
-- Data for Name: billings; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.billings (id, contract_id, user_id, status, payments, created_at, updated_at) FROM stdin;
1	532174ac-3ec4-45ad-aab4-e0d8aef93054	6	Оплачен	{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "6000.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}	2024-03-09 10:25:13	2024-03-09 10:25:13
2	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	7	Оплачен	{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "6000.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}	2024-03-09 10:25:13	2024-03-09 10:25:13
3	2c10ff5d-b004-476f-9ea0-ddcff57df792	8	Возврат	{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "1200.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}	2024-03-09 10:25:13	2024-03-09 10:25:13
4	f1c4d552-8fd2-4dcb-95df-9db7aabc32fa	10	Оплачен	{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "600.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}	2024-03-09 10:25:13	2024-03-09 10:25:13
10	44c5d697-e690-4c1d-9967-e79f3a0b1156	1	Оплачен	{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "6000.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}	2024-03-09 12:17:55	2024-03-09 12:17:55
11	add642ec-e8da-4c7e-b289-ba263f9ec220	1	Оплачен	{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "6000.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}	2024-03-09 12:18:20	2024-03-09 12:18:20
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
1	Поездка на луга	Посидим, чайку попьём, потреним, не обламывайся!	uploads/glamping.png	2024-11-09	07:14:00	2024-03-09 10:21:51	2024-03-09 10:21:51
2	Благословление гор	Посидим в горах, подышим	uploads/glamping.png	2024-05-05	09:00:00	2024-03-09 10:21:51	2024-03-09 10:21:51
3	Копание картошки	Целых 3 дня, 15 га и нам ни кто не помешает!	uploads/glamping.png	2024-01-09	08:50:00	2024-03-09 10:21:51	2024-03-09 10:21:51
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.migrations (id, migration, batch) FROM stdin;
68	2024_03_02_085045_create_workout_visitions_table	1
98	2014_10_12_000000_create_users_table	2
99	2014_10_12_100000_create_password_reset_tokens_table	2
100	2019_08_19_000000_create_failed_jobs_table	2
101	2019_12_14_000001_create_personal_access_tokens_table	2
102	2023_12_30_122856_create_type_workouts_table	2
103	2023_12_30_123634_create_workouts_table	2
104	2023_12_30_124308_create_schedule_times_table	2
105	2023_12_30_124403_create_halls_table	2
106	2023_12_30_124454_create_glampings_table	2
107	2023_12_30_124652_create_schedules_table	2
108	2023_12_30_124958_create_records_table	2
109	2024_01_18_104051_create_user_targets_table	2
110	2024_01_19_131102_create_billings_table	2
111	2024_03_09_061020_create_visitions_table	2
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
1	App\\Models\\User	22	user_token	d948453f798a696e40cffecbba4d8b0cc745ed210fc15fed7d2197c631a50f07	["*"]	2024-03-09 12:53:53	\N	2024-03-09 10:41:30	2024-03-09 12:53:53
\.


--
-- Data for Name: user_targets; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.user_targets (id, user_id, collection, created_at, updated_at) FROM stdin;
1	6	Хочу машину!	2024-03-09 10:21:07	2024-03-09 10:21:07
2	10	Хочу похудеть!	2024-03-09 10:21:07	2024-03-09 10:21:07
3	11	Хочу чай!	2024-03-09 10:21:07	2024-03-09 10:21:07
4	12	Хочу гречку!	2024-03-09 10:21:07	2024-03-09 10:21:07
5	13	Ну шоб эта девки сматрели!	2024-03-09 10:21:07	2024-03-09 10:21:07
6	17	Похудеть!	2024-03-09 10:21:07	2024-03-09 10:21:07
7	20	Что б эта больше двигаца!	2024-03-09 10:21:07	2024-03-09 10:21:07
8	19	Хочу в туалет!	2024-03-09 10:21:07	2024-03-09 10:21:07
14	22	Хочу чайю!	2024-03-09 11:39:45	2024-03-09 11:42:35
\.


--
-- Data for Name: visitions; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.visitions (id, contract_id, visition_date, status, created_at, updated_at) FROM stdin;
1	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-05	Пропущено	2024-03-09 10:27:05	2024-03-09 10:27:05
2	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-06	Посещено	2024-03-09 10:27:05	2024-03-09 10:27:05
3	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-07	Посещено	2024-03-09 10:27:05	2024-03-09 10:27:05
4	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-06	Посещено	2024-03-09 10:27:05	2024-03-09 10:27:05
5	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-09	Посещено	2024-03-09 10:27:05	2024-03-09 10:27:05
6	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-10	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
7	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-11	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
8	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-12	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
9	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-13	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
10	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-14	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
11	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-05	Посещено	2024-03-09 10:27:05	2024-03-09 10:27:05
12	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-06	Посещено	2024-03-09 10:27:05	2024-03-09 10:27:05
13	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-07	Перенесено	2024-03-09 10:27:05	2024-03-09 10:27:05
14	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-08	Посещено	2024-03-09 10:27:05	2024-03-09 10:27:05
15	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-09	Пропущено	2024-03-09 10:27:05	2024-03-09 10:27:05
16	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-10	Перенесено	2024-03-09 10:27:05	2024-03-09 10:27:05
17	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-11	Пропущено	2024-03-09 10:27:05	2024-03-09 10:27:05
18	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-12	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
19	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-13	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
20	94b99d78-de37-476b-b3de-6b8e7d7bd5b7	2024-03-14	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
21	2c10ff5d-b004-476f-9ea0-ddcff57df792	2024-03-12	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
22	2c10ff5d-b004-476f-9ea0-ddcff57df792	2024-03-13	Ожидает	2024-03-09 10:27:05	2024-03-09 10:27:05
23	f1c4d552-8fd2-4dcb-95df-9db7aabc32fa	2024-03-09	Перенесено	2024-03-09 10:27:05	2024-03-09 10:27:05
32	44c5d697-e690-4c1d-9967-e79f3a0b1156	2024-01-01	Ожидает	2024-03-09 12:17:55	2024-03-09 12:17:55
33	44c5d697-e690-4c1d-9967-e79f3a0b1156	2024-02-01	Ожидает	2024-03-09 12:17:55	2024-03-09 12:17:55
34	add642ec-e8da-4c7e-b289-ba263f9ec220	2024-01-01	Ожидает	2024-03-09 12:18:20	2024-03-09 12:18:20
35	add642ec-e8da-4c7e-b289-ba263f9ec220	2024-02-01	Ожидает	2024-03-09 12:18:20	2024-03-09 12:18:20
\.


--
-- Data for Name: workout_visitions; Type: TABLE DATA; Schema: public; Owner: raptor
--

COPY public.workout_visitions (id, contract_id, visition_date, status, created_at, updated_at) FROM stdin;
1	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-05	Пропущено	2024-03-09 10:25:42	2024-03-09 10:25:42
2	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-06	Посещено	2024-03-09 10:25:42	2024-03-09 10:25:42
3	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-07	Посещено	2024-03-09 10:25:42	2024-03-09 10:25:42
4	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-06	Посещено	2024-03-09 10:25:42	2024-03-09 10:25:42
5	532174ac-3ec4-45ad-aab4-e0d8aef93054	2024-03-09	Посещено	2024-03-09 10:25:42	2024-03-09 10:25:42
\.


--
-- Name: billings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.billings_id_seq', 11, true);


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

SELECT pg_catalog.setval('public.migrations_id_seq', 111, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, true);


--
-- Name: records_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.records_id_seq', 15, true);


--
-- Name: schedule_times_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.schedule_times_id_seq', 9, true);


--
-- Name: schedules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.schedules_id_seq', 11, true);


--
-- Name: type_workouts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.type_workouts_id_seq', 3, true);


--
-- Name: user_targets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.user_targets_id_seq', 14, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.users_id_seq', 22, true);


--
-- Name: visitions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.visitions_id_seq', 35, true);


--
-- Name: workout_visitions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.workout_visitions_id_seq', 6, true);


--
-- Name: workouts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: raptor
--

SELECT pg_catalog.setval('public.workouts_id_seq', 4, true);


--
-- PostgreSQL database dump complete
--

