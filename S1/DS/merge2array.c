#include<stdio.h>
#define smallsize 5                /* size of array 'b' */ 
#define bigsize 10                /* size of array 'a' */ 

void main(){
    int a[bigsize], b[smallsize], i;
    printf("\nEnter the elements of first array: \n");
    for(i=0; i<smallsize; i++){                            /* reading array 'a' */ 
        printf("a[%d] = ", i);
        scanf("%d", &a[i]);
    }
    printf("\nEnter the elements of second array: \n");   
    for(i=0; i<smallsize; i++){                              /* reading array 'b' */ 
        printf("b[%d] = ", i);
        scanf("%d", &b[i]);
    }
    for(i=smallsize; i<bigsize; i++){                       /* adding array b to a */ 
        a[i] = b[i - smallsize];                     
    }
    printf("\nThe merged array is: ");                     /* displaying the new merged array 'a' */  
    for(i=0; i<bigsize; i++){
        printf("%d ", a[i]);
    }
}