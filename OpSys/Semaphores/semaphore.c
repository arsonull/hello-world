#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
#include <pthread.h>
#include <semaphore.h>

sem_t semRead;
sem_t semWrite;

int total = 0;

void* thread(void* arg)
{
    sem_wait(&semRead); //Wait for the read semaphore to be available
    printf("Reading...\n");
    int num = (rand() % 50 + 1) + total; //Generate a random number and add total
    printf("Num = %d\n", num); //Display number for assurance
    sem_post(&semRead);

    sem_wait(&semWrite);
    printf("Writing...\n");
    total = total + num; /*Increase global variable in a way
    that would be problematic for synchronous access*/
    sem_post(&semWrite);
    sleep(3); //This is to prove that they're working together and it's not just one thread at a time
    
    printf("Exiting...\n");//Print exit for debugging
}
  
  
int main()
{
    sem_init(&semRead, 0, 1);
    sem_init(&semWrite, 0, 1);
    pthread_t t1,t2,t3;//create 3 threads
    pthread_create(&t1,NULL,thread,NULL);//instantiate 3 threads
    pthread_create(&t2,NULL,thread,NULL);
    pthread_create(&t3,NULL,thread,NULL);
    pthread_join(t1,NULL);//End threads
    pthread_join(t2,NULL);
    pthread_join(t3,NULL);
    sem_destroy(&semWrite);//Cleanly exit the semaphores
    sem_destroy(&semRead);
    printf("The total of these random numbers is: %d\n", total);
    return 0;
}
