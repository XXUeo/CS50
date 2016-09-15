/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    // TODO: implement a searching algorithm
    int start = 0;
    int end = n-1;
    int mid = (start + end) / 2;
    while (start <= end)
    {
          if (values[mid] == value)
          {
                return true;
          }
          else if (values[mid] > value)
          {
                end = mid -1;
          }
          else if (values[mid] < value)
          {
                start = mid +1;
          }
          else
             break;
          
    }
    return false;
    
   
    
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    
    
    // TODO: implement an O(n^2) sorting algorithm
    for (int j = 0; j < n-1; j++)
    {
         int flag = 0;
         for (int k = 0; k < n-j-1; k++)
         {
             if (values[k] > values[k+1])
             {
               
               int swap   = values[k];
               values[k]  = values[k+1];
               values[k+1] = swap;
              
               flag += 1;
             }
             
         }
         if (flag == 0)
            break;
         
         
    }
    
    
    return;
}