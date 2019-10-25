// https://www.hackerrank.com/challenges/ctci-comparator-sorting/problem
#include<cmath>
#include<cstdio>
#include<vector>
#include<iostream>
#include<algorithm>
using namespace std;

struct Player {
    int score;
    string name;
};

class Checker{
public:
  	// complete this method
    static int comparator(Player a, Player b)  {
        if(a.score == b.score) {
            return a.name.compare(b.name) < 0 ? 1 : -1;
        }else{
            return a.score > b.score ? 1 : -1;
        }
    }
};
