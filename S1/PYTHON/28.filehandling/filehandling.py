file = open("file.txt","r")
lines= file.readlines()
file.close()
for line in lines:
    print(f" {lines.index(line)+1}: {line}")
