#noinspection CucumberUndefinedStep
Feature: It is possible to generate a migration to rename the blog module to news
  Scenario: Generate blog to news migration
    When I run the command "settings:reset"
    And I run the command "sumocoders:migration:blog-to-news"
    Then the command has finished successfully
    And the file "src/../migrations/blog-to-news/locale.xml" should be dumped and look like "../sumocoders/migration/resources/blog-to-news.xml"
