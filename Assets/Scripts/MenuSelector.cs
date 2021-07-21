using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class MenuSelector : MonoBehaviour
{
    public static bool GameStart = false;
    public static float startSpeed;

    public static int coinChance;

    public static int multiplier;

    public static int selected;

    private float Percent;
    private float changeSpeed;
    void startGame()
    {
        Cursor.visible = false;
        GameStart = false;

        SceneManager.LoadScene("EndlessCrypto");
    }

    public void StartDoge()
    {
        coinChance = 2;
        multiplier = 1;
        selected = 0;
        GameStart = true;

        Percent = WebRequest.DogeChange;        
        startSpeed = 4;
        changeSpeed = Percent / 10;        
        startSpeed += changeSpeed;

        Invoke("startGame", 1f);
    }

    public void StartETH()
    {
        coinChance = 3;
        multiplier = 2;
        selected = 1;
        GameStart = true;

        Percent = WebRequest.EthChange;
        startSpeed = 8;
        changeSpeed = Percent / 10;

        startSpeed += changeSpeed;




        Invoke("startGame", 1f);
    }
    public void StartBTC()
    {
        coinChance = 4;
        multiplier = 3;
        selected = 2;
        GameStart = true;
        
        Percent = WebRequest.BtcChange;
        startSpeed = 12;
        changeSpeed = Percent / 10;
        startSpeed += changeSpeed;
        

        Invoke("startGame", 1f);
    }
}
