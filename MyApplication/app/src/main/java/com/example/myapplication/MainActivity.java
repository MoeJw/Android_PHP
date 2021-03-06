package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity implements  FetchDataCallbackInterface  {
    TextView Id ;
    TextView Name;
    static String data = null;
    EditText Search;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Id = findViewById(R.id.Id);
        Name = findViewById(R.id.Name);
        Search = findViewById(R.id.search);

        new FetchData("http://192.168.31.161/project/read.php?CustomerName="+Search.getText() ,this).execute();

    }
 public int sum(int one){
        return 0;
 }
    @Override
    public void fetchDataCallback(String result) {
        data = result;
        renderData();
    }

    public void renderData(){

        Id.append(data.toString());
        Name.append("asdfweewtwtwrtetrw");
    }

}
