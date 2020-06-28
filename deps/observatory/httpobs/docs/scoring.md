# HTTP Observatory Scoring Methodology

**Last Updated:** 2018-01-18 april@-.com<br>
**Author:** april@-.com

All websites start with a baseline score of 100, and receive penalties or bonuses from there. The minimum score is 0, but there is no maximum score. Bonus points are only awarded if the site's score without them is 90 (A) or greater. Currently, the highest possible score in the HTTP Observatory is 135.

Although both the letter grade ranges and modifiers are essentially arbitrary, they are based on feedback from industry professionals on how important passing or failing a given test is likely to be.

## Grading Chart

Scoring Range | Grade
:---: | :---:
100+ | &nbsp;A+
90-99 | &nbsp;A&nbsp;
85-89 | &nbsp;A-
80-84 | &nbsp;B+
70-79 | &nbsp;B&nbsp;
65-69 | &nbsp;B-
60-64 | &nbsp;C+
50-59 | &nbsp;C&nbsp;
45-49 | &nbsp;C-
40-44 | &nbsp;D+
30-39 | &nbsp;D&nbsp;
25-29 | &nbsp;D-
0-24 | &nbsp;F&nbsp;

## Score Modifiers

[Contribute.json](https://www.contributejson.org/) | Description | Modifier
--- | --- | :---:
contribute-json-only-required-on---properties | Contribute.json isn't required on websites that don't belong to - | 0
contribute-json-with-required-keys | Contribute.json implemented with the required contact information | 0
contribute-json-missing-required-keys | Contribute.json exists, but is missing some of the required keys | -5
contribute-json-not-implemented | Contribute.json file missing from root of website | -5
contribute-json-invalid-json | Contribute.json file cannot be parsed | -10
<br>