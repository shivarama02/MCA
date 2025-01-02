file=open("data.csv")
lines=file.readlines()
file.close()
columns=lines[0].split(",")
print("Columns are")
for column in columns:
    print(column)
c=int(input("Enter the column index to be displayed:"))
for line in lines:
    info=line.split(",")
    print(info[c])

