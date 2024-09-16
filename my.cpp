#include <bits/stdc++.h>
using namespace std;
int main(){
    int T;
    cin>>T;
    while(T--){
        int n;
        cin>>n;
          map<int,int>m;
        vector<int>v(n);
        int z=0;
        for(int i=0;i<n;i++){
            cin>>v[i];
            if(v[i]==0)z++;
            if(m[v[i]]<2)m[v[i]]++;
        }
    
        vector<int>ans;
        int i=1;
        for(auto it:m){
          if(i%2==1){
             ans.push_back(it.first);
          }
          else{
            if(it.second>1){
                ans.push_back(it.first);
            }
          }
          i++;
        }
        int cnt=0;
        for(i=0;i<ans.size();i++){
            if(cnt!=ans[i]){
                break;
            }
            else {
                cnt++;
            }
        }cout<<cnt<<"\n";
   
      

    }
    return 0;
}