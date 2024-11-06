#include <stdio.h>
#include <stdlib.h>
typedef struct Node
{
    int data;
    struct Node *Lchild;
    struct Node *Rchild;
} node;

node *new, *root, *temp;

void create()
{
    int num;
    printf("Enter the Number of Nodes in Your tree : ");
    scanf("%d", &num);
    for (int i = 0; i < num; i++)
    {
        printf("Enter a Value in your Node : ");
        scanf("%d", &new->data);
        new = (node *)malloc(sizeof(node));
        new->Lchild = NULL;
        new->Rchild = NULL;
        if (root == NULL)
        {
            root = new;
        }
        else
        {
            temp = root;
            while (temp->Lchild != NULL && temp->Rchild != NULL)
            {
                if (new->data > temp->data)
                {
                    temp = temp->Rchild;
                }
                else
                {
                    temp = temp->Lchild;
                }
            }
            temp = new;
        }
    }
}

void display()
{
    
}