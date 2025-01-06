placement={'Studentname':[] ,'Register No':[],'Class':[],'Company':[]}
n = int(input("Enter the no. of entries"))
for i in range(n):
    value = input("Enter student name: ")
    placement['Studentname'].append(value)

    value = int(input("Enter the register number: "))
    placement['Register No'].append(value)

    value = input("Enter class: ")
    placement['Class'].append(value)

    value = input("Enter company name: ")
    placement['Company'].append(value)

    
reg = placement['Register No']
reg = set(reg)

print(f"\nNo. of Students Placed is {len(reg)}")

reg = placement['Register No']

print(f"\n\nThe total no. of placements is {len(reg)}")

comp=input("Enter company name : ")

for i in range(n):
    if(placement['Company'][i]==comp):
        print(f"Name: {placement['Studentname'][i]} register no: {placement['Register No'][i]} class: {placement['Class'][i]}")

num = int(input("Enter register number: "))

print("\n\nCompanies are",end = " ")
for i in range(n):
    if(placement['Register No'][i]==num):

        print(placement['Company'][i], end = " ")


