file=open("email.csv","r")
rows=file.readlines()
file.close()
file=open("result.csv","w")
file.write(rows[0])#writing heading
for i in range(1,len(rows)):
    if(i%2==1):
        file.write(rows[i])
file.close()
