#include <stdio.h>
#include <stdlib.h>
typedef struct Node
{
    int data;
    struct Node *Next;
    struct Node *Prev;
} node;

node *head = NULL, *new, *current, *temp;

void create()
{
    int n;
    printf("Enter Number of Nodes : ");
    scanf("%d", &n);
    for (int i = 0; i < n; i++)
    {
        printf("Enter Data : ");
        new = (struct Node *)malloc(sizeof(struct Node));
        scanf("%d", &new->data);
        new->Next = NULL;
        new->Prev = NULL;
        if (head == NULL)
        {
            head = new;
            current = new;
        }
        else
        {
            new->Prev = current;
            current->Next = new;
            current = new;
        }
    }
}

void display()
{
    int chs;
    printf("Display From \n1. Start\n2. End\nChoose : ");
    scanf("%d", &chs);
    if (chs == 1)
    {
        for (temp = head; temp != NULL; temp = temp->Next)
        {
            printf("%d\t", temp->data);
        }
    }
    else
    {
        for (temp = current; temp != NULL; temp = temp->Prev)
        {
            printf("%d\t", temp->data);
        }
    }
}

void insert()
{
    int chs, p;
    printf("Data to be inserted \n1. At the Top\n2. At the Bottom\n3. In Between\nChoose(1/2/3): ");
    scanf("%d", &chs);
    new = (struct Node *)malloc(sizeof(struct Node));
    printf("Enter The data : ");
    scanf("%d", &new->data);
    new->Next = NULL;
    new->Prev = NULL;

    if (chs == 1)
    {
        // Top Insert
        new->Next = head;
        head->Prev = new;
        head = new;
    }

    else if (chs == 2)
    {
        // Bottom Insert
        current->Next = new;
        new->Prev = current;
        current = new;
    }

    else
    {
        // Between insert
        printf("enter the position : ");
        scanf("%d", &p);
        for (temp = head; temp->Next != NULL; temp = temp->Next, p--)
        {
            if (p == 2)
            {
                new->Next = temp->Next;
                new->Prev = temp;
                temp->Next->Prev = new;
                temp->Next = new;
                break;
            }
        }
        if (p > 2)
            printf("Position Out of LinkedList!");
    }
}

void delete()
{
    int chs, p;
    printf("Data to be Deleted \n1. From the Top\n2. From the Bottom\n3. In Between\nChoose(1/2/3): ");
    scanf("%d", &chs);

    if (chs == 1)
    {
        // Top Delete
        temp = head;
        head = head->Next;
        head->Prev = NULL;
    }

    else if (chs == 2)
    {
        // Bottom Delete
        temp = current;
        current = temp->Prev;
        current->Next = NULL;
    }

    else
    {
        // Between Delete
        printf("Enter the position : ");
        scanf("%d", &p);
        if (p == 1)
        {
            temp = head;
            head = head->Next;
            head->Prev = NULL;
        }
        else
        {
            for (temp = head; temp->Next != NULL; temp = temp->Next, p--)
            {
                if (p == 1)
                {
                    temp->Prev->Next=temp->Next;
                    temp->Next->Prev=temp->Prev;
                    break;
                }
            }
            if (p > 2)
                printf("Position Out of LinkedList!");
        }   
    }
    free(temp);
}

void search()
{
    int srch, flag;
    printf("Enter the element to be searched : ");
    scanf("%d", &srch);
    temp = head;
    do
    {
        if (temp->data == srch)
        {
            printf("The data is found in the LinkedList!");
            flag = 1;
            break;
        }
        temp = temp->Next;
    } while (current!=NULL);
    if (flag != 1)
        printf("The Data is Not Found in the LinkedList!");
}

void main()
{
    int c;
    while (1)
    {
        printf("\n1. Create a LL\n2. Display the LL\n3. Insert Elements into the LL\n4. Delete \n5. Search a Data\n6. End\nChoose : ");
        scanf("%d", &c);
        switch (c)
        {
        case 1:
            create();
            break;
        case 2:
            display();
            break;
        case 3:
            insert();
            break;
        case 4:
            delete ();
            break;
        case 6:
            break;
        case 5:
            search();
            break;
        default:
            printf("Instructions Unclear");
            break;
        }
        if (c == 6)
            break;
    }
}