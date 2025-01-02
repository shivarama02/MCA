class Time:
    def __init__(self, hours=0, mins=0, secs=0):
        self.hours=hours
        self.mins=mins
        self.secs=secs
    
    def __add__(self,time2):
        secs=(self.secs+time2.secs)%60
        mins=(self.secs+time2.secs)//60+(self.mins+time2.mins)%60
        hrs=(self.mins+time2.mins)//60+(self.hours+time2.hours)
        time3=Time(hrs,mins,secs)
        return time3
    def getTime(self):
        print(str(self.hours)+":"+str(self.mins)+":"+str(self.secs))
h1,m1,sec1=map(int, input("Enter the hours,minutes and seconds of time 1:").split())
h2,m2,sec2=map(int, input("Enter the hours,minutes and seconds of time 2:").split())

t1=Time(h1,m1,sec1)
t2=Time(h2,m2,sec2)
t3=t1+t2
t1.getTime()
t2.getTime()
t3.getTime()
        
        
        
        
        
        
        
        
# h1,m1,sec1=int(input("Enter the hours,minutes and seconds of time 1:"))
