#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
#include <pthread.h>
#include <semaphore.h>

sem_t mutex;

int total = 0;

void* thread(void* arg)
{
    sem_wait(&mutex); //Wait for the mutex to be available
    int num = (rand() % 50 + 1); //Generate a random number
    printf("Num = %d\n", num); //Display number for assurance

    total = total + num; /*Increase global variable in a way
    that would be problematic for synchronous access*/
    
    sleep(3);//sleep to prove the other threads wait
    
    printf("Exiting...\n");//Print exit for debugging
    sem_post(&mutex);//Free up the mutex
}
  
  
int main()
{
    sem_init(&mutex, 0, 1);//initialize the mutex
    pthread_t t1,t2,t3;//create 3 threads
    pthread_create(&t1,NULL,thread,NULL);//instantiate 3 threads
    sleep(1);//This was for testing
    pthread_create(&t2,NULL,thread,NULL);
    pthread_create(&t3,NULL,thread,NULL);
    pthread_join(t1,NULL);//End threads
    pthread_join(t2,NULL);
    pthread_join(t3,NULL);
    sem_destroy(&mutex);//Cleanly exit the semaphore
    printf("The total of these random numbers is: %d\n", total);
    return 0;
}