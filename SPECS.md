# Specs
| |Behavior|Input|Output|_Notes_|
|-|-|-|-|-|
|1.|The model does not find a match in an empty string.|Word: `'foo'` Text: `''`|`false`|_An empty string is the simplest input for the program to assess._|
|2.|The model determines if two strings are equivalent.|Word: `'foo'` Text: `'foo'`|`true`|_Detection of a string is a prerequisite to counting occurrences correctly. This is the simplest input with which the program can find a match._|
|3.|The model does the above  without case sensitivity.|Word: `'fOO'` Text: `'Foo'`|`true`|_A string equivalent case-insensitively to the word is the next closest thing to match._|
|4.|The model determines if one string is embedded in another.|Word: `'foo'` Text: `'foo bar'`|`true`|_This addresses the next level of complexity of finding matches. The example input is used so that the test still passes when the program requires punctuation to delimit a match._|
|5.|The model finds a match only if its presence in the text is delimited by string boundary or whitespace.|Word: `'foo'` Text: `'foobar'`|`false`|_Using whitespace is the next step to only making whole-word matches. A negative test is used because the domain of inputs that produce `true` has been reduced._|
|6.|The model finds a match only if its presence in the text is delimited by string boundary or any punctuation.|Word: `'foo'` Text: `'Foo.bar()'`|`true`|_This test addresses the additional criteria to finding a delimiter._|
|7.|The model counts the number of times the word occurs in the text.|Word: `'foo'` Text: `'foo bar.Foo'`|Frequency: `2`|_This verifies that the program counts multiple occurrences._|
