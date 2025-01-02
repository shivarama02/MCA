#Create a list removing all the even numbers 
abc=list(input("Enter the numbers of your list:\n" ).split(","))
cba=[]
for i in abc:
    cba.append(int(i))
for i in cba:
    if(i%2==0):
        cba.remove(i)
print(f"The modified list is: {cba}")
