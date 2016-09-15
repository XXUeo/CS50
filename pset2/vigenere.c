 #include <stdio.h>
 
 // for string argv[]
 #include <cs50.h>
 
 
 // for strlen()
 #include <string.h>
 
 // for isalpha()
 #include <ctype.h>
 
 
 int main(int argc, string argv[])
 {
    // vigenere requires 1 keyword passed through
    // the command line
    if(argc != 2)
    {
        printf("That is not valid.\n");
        return 1;
    }
    
    // keyword cannot contain letters or symbols
    string k = argv[1];
    int klen = strlen(argv[1]);
    
    char kletter;
    
    for(int i = 0; i < klen; i++)
    {
    
        kletter = k[i];
        
        if(!isalpha(kletter))
        {
            printf("That's not valid\n");
            return 1;
        }
    }
    
    // Now set the key to its numerica shift
    // eg, 'A' or 'a' is equal to a zero shift
    // 'B' or 'b' is a one-place shift
    // 
    
    int shift[klen];
    
    for(int i = 0; i < klen; i++)
    {
        if(isupper(k[i]))
            shift[i] = k[i] - 65;
        else
            shift[i] = k[i] - 97;
            
    }
   
    
    // Prompt user for string to be enciphered: plaintext
   // printf("Please enter a string: ");
    string plaintext = GetString();
    
    // Loop for each character in plaintext
    int plen = strlen(plaintext);
    
    // counter for advancing encryption. Advance only
    // for letters
    int next = 0;
    
    for(int j = 0; j < plen; j++)
    {
       
        if(isalpha(plaintext[j]))
        {
            if(islower(plaintext[j]))
            {
                if(plaintext[j] + shift[next] > 122)
                {
                    //printf("In loop ");
                    //printf(" %d ", plaintext[j] + shift[next]);
                    printf("%c", (plaintext[j] + shift[next]) - 26);
                }
                else
                    printf("%c", plaintext[j] + shift[next]);
                next++;
                if(next == klen)
                    next = 0;
                
            }
            else if(isupper(plaintext[j]))
            {
                if(plaintext[j] + shift[next] > 90)
                {
                    // printf("In loop ");
                    // printf(" %d ", plaintext[j] + shift[next]);
                    printf("%c", (plaintext[j] + shift[next]) - 26);
                }
                else
                    printf("%c", plaintext[j] + shift[next]);
                next++;
                if(next == klen)
                    next = 0;
                
               
            }
        }
        else
            printf("%c", plaintext[j]);
    } 
 
 
    printf("\n");
    return 0;
 }