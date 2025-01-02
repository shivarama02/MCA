file=open("data.csv","r")
lines=file.readlines()
file.close()
for line in lines:
    print(list(map(lambda x: x.strip(), line.split(","))))