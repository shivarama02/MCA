class Rectangle:
    def __init__(self, length, breadth):
        self.length = length
        self.breadth = breadth
    
    def area(self):
        area = round(self.length * self.breadth, 2)
        return area
    
    def perimeter(self):
        perimeter = round(2 * (self.length + self.breadth), 2)
        return perimeter
    

rec1 = Rectangle(5, 6)
rec2 = Rectangle(2, 3)

if rec1.area() > rec2.area():
    print("Rectangle 1 has a greater area")
else:
    print("Rectangle 2 has a greater area")

