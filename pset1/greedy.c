#include <stdio.h>
#include <cs50.h>
#include <math.h>



float customer(void);//change float to int
int greedyAlgo(int);//greedy algolythm


int main(void){
 
    
 
  customer();
   

}


float customer(void)
{

printf("how much change?(in dollar)\n");

float changeTotal;
      //exclude non natural number
      do
      {
      changeTotal = GetFloat();
       if(changeTotal < 0.00){
        printf("Please put in a positive number: ");
        changeTotal = GetFloat();
       }
      }
      
      while(changeTotal <0);
//change to int      
int intTotal = round(changeTotal * 100);
greedyAlgo(intTotal);

return 0;
      
}


int greedyAlgo(total)
{
          
int quarter = 25;
int dime = 10;
int nickel = 5;
int pennie = 1;
        
//from quarter to pennie, devide total amount
int quarterCoin = (total/quarter);
total = total - (quarterCoin*quarter);

int dimeCoin = (total/dime);
total = total - (dimeCoin*dime);

int nickelCoin = (total/nickel);
total = total - (nickelCoin*nickel);

int pennieCoin = (total/pennie);

int sum = quarterCoin + dimeCoin + nickelCoin + pennieCoin;
printf("%i\n",sum);


return 0;      
      
}