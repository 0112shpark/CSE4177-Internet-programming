#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define LF 10
#define CR 13

#define MAX_ENTRIES 10000

typedef struct
{
    char *name;
    char *val;
} entry;

char x2c(char *what);
void unescape_url(char *url);
void plustospace(char *str);
void getword(char *word, char *line, char stop);

char x2c(char *what)
{
    register char digit;

    digit = (what[0] >= 'A' ? ((what[0] & 0xdf) - 'A') + 10 : (what[0] - '0'));
    digit *= 16;
    digit += (what[1] >= 'A' ? ((what[1] & 0xdf) - 'A') + 10 : (what[1] - '0'));
    return (digit);
}

void unescape_url(char *url)
{
    register int x, y;

    for (x = 0, y = 0; url[y]; ++x, ++y)
    {
        if ((url[x] = url[y]) == '%')
        {
            url[x] = x2c(&url[y + 1]);
            y += 2;
        }
    }
    url[x] = '\0';
}

void plustospace(char *str)
{
    register int x;

    for (x = 0; str[x]; x++)
        if (str[x] == '+')
            str[x] = ' ';
}

int main(int argc, char *argv[])
{
    entry entries[MAX_ENTRIES];
    register int x, m = 0;
    char *cl;
    char *temp;
    printf("Content-type: text/html charset=UTF-8%c%c", 10, 10);

    if (strcmp(getenv("REQUEST_METHOD"), "GET") != 0)
    {
        printf("This script should be referenced with a METHOD of GET.\n");
        printf("If you don't understand this, see this ");
        printf("<A HREF=\"http://www.ncsa.uiuc.edu/SDG/Software/Mosaic/Docs/fill-out-forms/overview.html\">forms overview</A>.%c", 10);
        exit(1);
    }

    char *query_string = getenv("QUERY_STRING");

    // &기준으로 나누기
    cl = strtok_r(query_string, "&", &temp);

    while (cl != NULL)
    {
        // =기준으로 name,val나누기
        entries[m].name = strtok(cl, "=");
        entries[m].val = strtok(NULL, "=");

        if (entries[m].val != NULL && entries[m].name != NULL)
        {
            plustospace(entries[m].val);
            unescape_url(entries[m].val);
            m++;
        }

        cl = strtok_r(NULL, "&", &temp);
    }

    printf("<html><head><meta charset=\"UTF-8\"><title>회원가입 결과페이지</title></head><body>");
    printf("<H1>회원가입 결과입니다.</H1>");
    printf("다음 결과를 확인하세요 :<p>%c", 10);
    printf("<ul>%c", 10);

    for (x = 0; x < m; x++)
        printf("<li> <code>%s = %s</code>%c", entries[x].name,
               entries[x].val, 10);
    printf("</ul>%c", 10);
    printf("</body></html>");

    return 0;
}
