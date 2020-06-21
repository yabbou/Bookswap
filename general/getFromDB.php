<?php

function getAllBooks()
{
    $sql = "SELECT * FROM book";
    return sqlToArray($sql);
}

function getSpecificBooks()
{
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));

    $sql = "SELECT * FROM book WHERE title LIKE '%$browse%'"; //or professor LIKE %$browse% or ISBN_10 LIKE %$browse%
    return sqlToArray($sql);
}

function getBooksByProf()
{
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'prof'));
    $browse = toCol($browse);

    $sql = "SELECT * FROM Professor join book on book.Professor = Professor.Name" +
        "where book.Professor LIKE %$browse%";
    return sqlToArray($sql);
}

function getBooksByMajor()
{
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'major'));
    $browse = toCol($browse);

    $sql = "SELECT * FROM Professor join bookon book.Major = Major.ID" +
        "where Major.ID LIKE %$browse% or Major.Category LIKE %$browse%";
    return sqlToArray($sql);
}

function toCol($s)
{
    return str_replace('-', ' ',  $s);
}
