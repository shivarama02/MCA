class Rectangle:
    def __init__(self, length, width):
        self.__length = length
        self.__width = width
    
    def area(self):
        area = round(self.__length * self.__width, 2)
        return area
    
    def perimeter(self):
        perimeter = round(2 * (self.__length + self.__width), 2)
        return perimeter
    
    def __lt__(self, other):
        return self.area() < other.area()
    

rec1 = Rectangle(5, 6)
rec2 = Rectangle(2, 3)

if rec1 < rec2:
    print("Rectangle 1 has a smaller than Rectangle 2")
else:
    print("Rectangle 2 has a smaller area than Rectangle 1")

