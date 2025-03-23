interface Area{
    void area();
    void perimeter();
}

class Circle implements Area {
    int r;

    Circle(int r) {
        this.r = r;
    }
    public void area() {
        System.out.printf("The area of circle is: %.2f%n", (3.14 * r * r));
    }
    
    public void perimeter() {
        System.out.printf("The area of circle is: %.2f%n", (2 * 3.14 * r));
    }
}

class Rectangle implements Area {
    int l, b;

    Rectangle(int l, int b) {
        this.l = l;
        this.b = b;
    }
    public void area() {
        System.out.println("The area of rectangle is: " + (l * b));
    }

    public void perimeter() {
        System.out.println("The perimeter of the rectangle is: " + (2 * (l + b)));
    }
}

public class InterfaceAandP {
    public static void main(String[] args) {
        Circle c = new Circle(3);
        Rectangle r = new Rectangle(3, 5);
        c.area();
        c.perimeter();
        r.area();
        r.perimeter();
    }
}