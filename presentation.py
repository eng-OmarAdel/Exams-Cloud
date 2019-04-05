from fuzzywuzzy import fuzz
from fuzzywuzzy import process
import sys
#----------------------------------------------------------------------------
f=open("C:/Users/Leno/Desktop/examCloud/duplicateInput.txt", "r")
contents =f.read()
tokens=contents.split("(@)")
targetQuestion = tokens[0]
targetAnswer = tokens[1]
for i in range(2,12,2):
    if i < len(tokens):
        DBQuestion = tokens[i]
        DBAnswer = tokens[i+1]
        answerSimilarity = fuzz.token_sort_ratio(targetAnswer,DBAnswer)
        if  answerSimilarity > 87:
            questionSimilarity = fuzz.token_set_ratio(targetQuestion,DBQuestion)
            if questionSimilarity > 73 :
                print(1)
                sys.exit()
                
print(0)
