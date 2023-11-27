%{
 #include <stdio.h>
 static int car = 0, lig = 0, nb_mot = 0;

 /*
 $ lex main.l
 $ gcc lex.yy.c -lfl -o main
 $ ./main
 */
%}

NIMPORTE_KOI_SAUF_RETOUR_CHARIOT        .
RETOUR_CHARIOT      \n
LIGNE       [ˆ \t\n]+
CHAR		[a-zA-Z]
MOT 		{CHAR}+
CHARS		{MOT}
CHAINE		\"{NIMPORTE_KOI_SAUF_RETOUR_CHARIOT}+\"
CHAINE_VIDE \"\"
CHIFFRE		[0-9]
OPREL		=|<|<=|>|>=
OP			ADD|SOUS
NBENTIER	{CHIFFRE}+
NBREEL		{NBENTIER}"."{NBENTIER}
ID			#X{NBENTIER}
T			{ID}|{NBENTIER}|{NBREEL}|{ID}[{NBENTIER}]
EXPR1		{ID}={NBENTIER}
EXPR2		{ID}{OPREL}{NBENTIER}
EXPR3		{ID}++
EXP 		{EXP}{OP}{T}|{T}
INS1		ID := EXP|ID := CHAINE|echo(CHAINE)|ID++
INS			INS1|FOR(EXPR1 ;EXPR2 ;EXPR3)INS1
INSTS		INS ; INS|INS

TYPES		"entier"|"reel"|"char"
TAB			tableau[{NBENTIER}] de {TYPES}
TYPEC		{TAB}|"string"
TYPE		{TYPES}|{TYPEC}
DECV		{ID} := {TYPE}
DECVARS		{DECVARS} ,{DECV}|{DECV}
CORPS		$INS{INSTS}\$INS
TETE		$VARS{DECVARS}\$VARS
PROG		$MONPROGRAMME{TETE}{CORPS}\$MONPROGRAMME
MOTCLE      ":="|"FOR"|"for"|"tableau"|"echo"|"de"|"string"|"$INS"|"\$INS"|"$VARS"|"\$VARS"|"$MONPROGRAMME"|"\$MONPROGRAMME"|"("|")"|"["|"]"|","|"ADD"|"SOUS"|"++"|";"|\"

%%
{MOTCLE}                                {printf("un mot cle du langage : %s\n", yytext);}
{CHIFFRE}                               {printf("un chiffre : %s\n", yytext);}
{NBENTIER}                              {printf("un nombre entier : %s\n", yytext);}
{CHAR}		                            {printf ("charactere detecter : %c\n", yytext[0]); }
{CHAINE}                                {printf ("une chaine de caracteres : %s\n", yytext);}
{CHAINE_VIDE}                           {printf ("une chaine vide: %s\n", yytext);}
{TYPES} 		                        {printf ("un type simple : %s\n", yytext); ++nb_mot; }
{MOT} 		                            {printf ("un mot : %s\n", yytext); ++nb_mot; }
{ID}                                    {printf ("un identifiant : %s\n", yytext); ++nb_mot; }
{OPREL}                                 {printf ("operateur relationel : %s\n", yytext);}
{RETOUR_CHARIOT}                        {++car; ++lig; }
{LIGNE}                                 {printf("ligne vide d'espaces \n"); car += yyleng; ++nb_mot; }
{NIMPORTE_KOI_SAUF_RETOUR_CHARIOT}      {printf("car. non reconnu: (%c)\n",yytext[0]); ++car;}

%%

int main( void ) {
    printf ("Entree une instruction a analysée :\n");
    yylex();
}
int yywrap () {
    printf ("%7d %7d %7d\n", lig, nb_mot, car);
    return 1;
}
