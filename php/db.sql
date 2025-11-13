create table users (
    id int(5) auto_increment primary key,
    username varchar(50) not null unique,
    email varchar(100) not null unique,
    password_hash varchar(255) not null,
    `role` enum('member','admin') default 'member', -- restrict roles to member and admin
    created_at timestamp default current_timestamp
);

create table announcements (
    id int(5) auto_increment primary key,
    admin_id int not null,
    title varchar(150) not null,
    content text not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp null,
    foreign key (admin_id) references users(id) on delete cascade
);

create table comments (
    id int(5) auto_increment primary key,
    announcement_id int(5) not null,
    user_id int(5) not null,
    content text not null,
    is_flagged boolean default false,
    created_at timestamp default current_timestamp,
    foreign key (announcement_id) references announcements(id) on delete cascade, -- deletes comments if user is deleted
    foreign key (user_id) references users(id) on delete cascade
);

create table movies (
    id int(5) auto_increment primary key,
    title varchar(100) not null,
    genre varchar(50),
    release_year int,
    created_at timestamp default current_timestamp
);

-- or 
-- create table movies (
--     id int(5) auto_increment primary key,
--     api_id varchar(50) not null,
--     source varchar(50) not null,
--     title varchar(100) not null, 
--     created_at timestamp default current_timestamp
-- );

create table reviews (
    id int(5) auto_increment primary key,
    movie_id int not null,
    reviewer_id int not null,
    title varchar(100) not null,
    content text not null,
    rating decimal(2,1),
    created_at timestamp default current_timestamp,
    updated_at timestamp null,
    foreign key (movie_id) references movies(id) on delete cascade,
    foreign key (reviewer_id) references users(id) on delete cascade
);

create table contact_messages (
    id int auto_increment primary key,
    `name` varchar(100) not null,
    email varchar(100) not null,
    `message` text not null,
    created_at timestamp default current_timestamp
);
--