STL
===
Development: [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AGmakonts/STL/badges/quality-score.png?b=development)](https://scrutinizer-ci.com/g/AGmakonts/STL/?branch=development) [![Code Coverage](https://scrutinizer-ci.com/g/AGmakonts/STL/badges/coverage.png?b=development)](https://scrutinizer-ci.com/g/AGmakonts/STL/?branch=development) [![Build Status](https://scrutinizer-ci.com/g/AGmakonts/STL/badges/build.png?b=development)](https://scrutinizer-ci.com/g/AGmakonts/STL/build-status/development)

Simple Type Lib for PHP
-----------------------

Library inspired by [nicolopignatelli/valueobjects](https://github.com/nicolopignatelli/valueobjects/blob/master/src/ValueObjects/Null/Null.php). My goal was to create
a set of classes that will serve as a object oriented implementation of basic data types to fight with PHPs dynamic types and at the same time add few extra classes for
common tasks. One of the main features of STL is that all objects have one instance per value `String::get('Test') === String::get('Test')`. Thanks to that approach
it is easy to store objects in for example `SPLObjectStorage` or similar containers that depend od object hash.


Roadmap
-------

Currently, after quite a big rebuild (that is still in progress) only String is implemented almost fully, rest of planned data types and value objects is listed below:

- Number
    + Integer
    + Float
    + Decimal
    + Fraction
- DateTime
    + Date
    + Year
    + Month
    + Week
    + Day
    + Time
    + Hour
    + Minute
    + Second
    + DateTime
- Structure
    + TypedArray
    + TypedList
    + Dictionary
- Identity
    + UUID
    + Numeric
    + Alphanumeric
- Text
    + Word
    + Sentence
    + Paragraph

