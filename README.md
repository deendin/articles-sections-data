# The Article Data Population and Cleaning
## Solution notes
This solution uses the articles and sections data which can be found in: `features/resultset.csv` file. This solution accepts this file and extracts it content (the dataset) through using the `PopulateArticleData` and the `PopulateSectionData` logic which is been delegated to a Person action (`Actions\CreateArticle` and `Actions\CreateSection`) in-order to parse each of the titles, section_name to save them in thier respective models (`articles` table and `sections` table).


### How has this been done?
To effectively know how the dataset relates to one another, there are two tables created which are: `articles` table and `sections` table. The articles table has a foreign key called (`section_id`) which is used to determining which article belongs to which section. The section table simply has the `section_name` and its `section_id`.

- To follow the TDD convention, this implementation starts with creating some tests against what doesn't exist such as testing if we can fetch an article and sections of an article. These tests can be found in the tests folder. Please go to the `Setup aand Instructions` section of this README file to see more about testing this.
- This implementation also takes care of validating if the csv file parsed in exists or not.
- This implementation uses a `App\Commands\PopulateArticleData` and `App\Commands\PopulateSectionData` to effectively populate the article and section data.

### Ambiguities
N/A.

### Tooling
- [Composer] for dependency management.
- [PHPUnit] for the test suite.

## Getting started

Before setting up this repository, the following are the dependencies that needs to be available on your machine:

- Composer
- PHP (I have PHP 8.1.11 installed)

## Setup & Instruction

1. Clone the repository: `git clone https://github.com/deendin/articles-sections-data.git`
2. Assuming that the Dependencies listed above are satisfied, you can ```cd``` into the directory called ```articles-sections-data.git```
3. When inside this repository directory, run ```composer install``` to install the project dependencies.
4. Duplicate the content of the `.env.example` file and create a `.env` file with the same content in the example file. You may need to adjust the env file key values such as the `DB_HOST`, `DB_NAME`, `DB_USER` and `DB_PASSWORD` to suite your database configuration setup.
5. To test, make sure you are still in this repository directory and in your terminal, to run the test suite run ```vendor/bin/phpunit``` for the test result. This test will trigger the contents of the tests folder which also triggers and makes an attempt to extract the articles and sections in the `results.csv` file and populate the database with the data. So, you may not need to manually import the dataset into your database because this test does that for you but you will need to create the articles and sections table yourself.

## The task / Specifications
Please supply the PHP script which will work accordingly to the below requirement.

The solution should be tested and optimised in terms of efficiency.

In the attachment, you can find the resultset.csv file containing data of titles of articles with sections.

Based on this file please create a MySQL database with a proper structure which you find as most appropriate.

Once done please import data from resultset.csv file into your database.

PHP script should take 10 latest/newest articles from your database but with the assumption that each article should belong to a different section.

The list of 10 records should be displayed on the frontend in a responsive layout.

Please supply all files related to the backend, frontend and database.

We reserve the right to refuse the answer re the proper solution of the above task.

Input
```"id","section_id","section name","title","created"```
```10367,9,"Day & Night","Shirley visit is a whirl",18/06/07 00:00```


Output
<img width="1728" alt="Example Output" src="https://user-images.githubusercontent.com/118926333/205403223-06a1d612-09db-46f8-ab91-441903905296.png">


## What I could have done better if I had more time:
1. Properly paginate the articles data from the backend and not load everything to the front end at once, even though the frontend has a pagination. Doing this will allow the page load faster than loading everything at once to the articles page.
2. Write more tests, check if articles are actually been returned, if sections are returning it's contents.
3. Extend the validation logic to check and accept only csv files even if a file which exist is parsed in.
4. Add Github Action for PHP-CS-Fixer that will be triggered before commit or push. This will act like a pre-commit.
5. Add docker to dockerize the system. This will allow setting up the project to be seamless irrespective of the machine or system that it needs to be run on.