PGDMP         *                u        
   cs313_poll    9.5.6    9.5.6     v           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            w           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            x           1262    84779 
   cs313_poll    DATABASE     |   CREATE DATABASE cs313_poll WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';
    DROP DATABASE cs313_poll;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            y           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    6                        3079    12393    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            z           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    84792    poll    TABLE     �   CREATE TABLE poll (
    id integer NOT NULL,
    name character varying(80) NOT NULL,
    question text NOT NULL,
    user_id integer NOT NULL
);
    DROP TABLE public.poll;
       public         postgres    false    6            �            1259    84790    poll_id_seq    SEQUENCE     m   CREATE SEQUENCE poll_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.poll_id_seq;
       public       postgres    false    184    6            {           0    0    poll_id_seq    SEQUENCE OWNED BY     -   ALTER SEQUENCE poll_id_seq OWNED BY poll.id;
            public       postgres    false    183            �            1259    84803    response    TABLE     �   CREATE TABLE response (
    id integer NOT NULL,
    poll_id integer NOT NULL,
    name character varying(80) NOT NULL,
    comment text,
    responses integer DEFAULT 0 NOT NULL
);
    DROP TABLE public.response;
       public         postgres    false    6            �            1259    84801    response_id_seq    SEQUENCE     q   CREATE SEQUENCE response_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.response_id_seq;
       public       postgres    false    6    186            |           0    0    response_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE response_id_seq OWNED BY response.id;
            public       postgres    false    185            �            1259    84783    user_    TABLE     �   CREATE TABLE user_ (
    id integer NOT NULL,
    username character varying(80) NOT NULL,
    password character varying(80) NOT NULL,
    is_active boolean DEFAULT true NOT NULL
);
    DROP TABLE public.user_;
       public         postgres    false    6            �            1259    84781    user__id_seq    SEQUENCE     n   CREATE SEQUENCE user__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.user__id_seq;
       public       postgres    false    182    6            }           0    0    user__id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE user__id_seq OWNED BY user_.id;
            public       postgres    false    181            �           2604    84795    id    DEFAULT     T   ALTER TABLE ONLY poll ALTER COLUMN id SET DEFAULT nextval('poll_id_seq'::regclass);
 6   ALTER TABLE public.poll ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    183    184    184            �           2604    84806    id    DEFAULT     \   ALTER TABLE ONLY response ALTER COLUMN id SET DEFAULT nextval('response_id_seq'::regclass);
 :   ALTER TABLE public.response ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    186    185    186            �           2604    84786    id    DEFAULT     V   ALTER TABLE ONLY user_ ALTER COLUMN id SET DEFAULT nextval('user__id_seq'::regclass);
 7   ALTER TABLE public.user_ ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    182    181    182            q          0    84792    poll 
   TABLE DATA               4   COPY poll (id, name, question, user_id) FROM stdin;
    public       postgres    false    184   �       ~           0    0    poll_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('poll_id_seq', 1, false);
            public       postgres    false    183            s          0    84803    response 
   TABLE DATA               B   COPY response (id, poll_id, name, comment, responses) FROM stdin;
    public       postgres    false    186   �                  0    0    response_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('response_id_seq', 1, false);
            public       postgres    false    185            o          0    84783    user_ 
   TABLE DATA               ;   COPY user_ (id, username, password, is_active) FROM stdin;
    public       postgres    false    182   �       �           0    0    user__id_seq    SEQUENCE SET     4   SELECT pg_catalog.setval('user__id_seq', 1, false);
            public       postgres    false    181            �           2606    84800 	   poll_pkey 
   CONSTRAINT     E   ALTER TABLE ONLY poll
    ADD CONSTRAINT poll_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.poll DROP CONSTRAINT poll_pkey;
       public         postgres    false    184    184            �           2606    84812    response_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY response
    ADD CONSTRAINT response_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.response DROP CONSTRAINT response_pkey;
       public         postgres    false    186    186            �           2606    84789 
   user__pkey 
   CONSTRAINT     G   ALTER TABLE ONLY user_
    ADD CONSTRAINT user__pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.user_ DROP CONSTRAINT user__pkey;
       public         postgres    false    182    182            �           2606    84818    poll_user_id_fkey    FK CONSTRAINT     g   ALTER TABLE ONLY poll
    ADD CONSTRAINT poll_user_id_fkey FOREIGN KEY (user_id) REFERENCES user_(id);
 @   ALTER TABLE ONLY public.poll DROP CONSTRAINT poll_user_id_fkey;
       public       postgres    false    182    184    2037            �           2606    84813    response_poll_id_fkey    FK CONSTRAINT     n   ALTER TABLE ONLY response
    ADD CONSTRAINT response_poll_id_fkey FOREIGN KEY (poll_id) REFERENCES poll(id);
 H   ALTER TABLE ONLY public.response DROP CONSTRAINT response_poll_id_fkey;
       public       postgres    false    184    186    2039            q      x������ � �      s      x������ � �      o      x������ � �     