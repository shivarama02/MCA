// Create two arrays A and B, which contains 4 elements each.Construct a new
// arrary named C, it's first element is the product of first elements of A and B,
// and it's second element is the product of second element of A and B and so on..

#include <stdio.h>

void main()
{
    int A[4], B[4], C[4];
    for (int i = 0; i < 4; i++)
    {
        printf("Enter data A[%d] : ", i + 1);
        scanf("%d", &A[i]);
        printf("Enter data B[%d] : ", i + 1);
        scanf("%d", &B[i]);

        C[i] = A[i] * B[i];
    }
    for (int i = 0; i < 4; i++)
    {
        printf("%d\t", C[i]);
    }
}