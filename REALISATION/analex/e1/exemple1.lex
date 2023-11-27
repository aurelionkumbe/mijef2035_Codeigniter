/* -- postfix_eval.lex --
   Lit et evalue une expression postfixee.
*/

%{
#define MAXSP 100
int value;      /* valeur associee a la chaine reconnue */
int st[MAXSP];  /* pile */
int sp=-1;      /* pointeur de pile */

#define STOP 0
/*
$ lex exemple1.lex
$ gcc lex.yy.c -lfl -o rien
$ rien
*/
%}

%%

[0-9]+      {
        value=atoi(yytext);
        if (sp >= MAXSP) return STOP;
        st[++sp] = value;
        printf("un nombre \n");
        }

[-+*/]      {
        int a1, a2;
        value=yytext[0];
        if (sp < 0)
            {
            printf("Pas assez d'arguments pour l'operation '%c'\n",value);
            return STOP;
            }
        else
            a2 = st[sp--];      /* on depile le 2em arg */

        if (sp < 0)
            {
            printf("Premier argument manquant pour l'operation '%c'\n",value);
            return STOP;
            }
        else
            a1 = st[sp--];      /* on depile le 1er arg */

        switch (value)
            {
            case '-':
                st[++sp] = a1 - a2;
                break;
            case '*':
                st[++sp] = a1 * a2;
                break;
            case '+':
                st[++sp] = a1 + a2;
                break;
            case '/':
                st[++sp] = a1 / a2;
                break;
            }
        }

[ \t\n]+    ;
.           printf("car. non reconnu: (%c)\n",yytext[0]);

%%
int main(void)
{
/* Analyse de l'expression */
yylex();

if ( sp != 0 )
    printf("sp!=0 : expr. postfixee incorrecte ou erreur prog. C\n");
else
    printf("Resultat : %d\n", st[sp--] );
}
