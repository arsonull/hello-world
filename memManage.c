#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>

int main()
{
    int a, b, c;

    printf("Enter a decimal\n");
    scanf("%d", &a);

    printf("Your number in binary is:\n");

    b = 8;

    do
    {
        b--;
    } while (c = 0);
    

    for (b >= 0; b--)
    {
        c = a >> b;

        
        if (c & 1)
        {
            printf("1");
        }
        else
        {
            printf("0");
        }
    }

    printf("Your number in hexadecimal is: %X", a);
    return 0;
}