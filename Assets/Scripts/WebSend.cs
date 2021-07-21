using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class WebSend : MonoBehaviour
{
    private int CoinScore = Player.Coins;
    private int Score = ScoreManager.score;
    private int multiplier = MenuSelector.multiplier;



    private int finalCoins;
    void Start()
    {
        finalCoins = CoinScore *= multiplier;
        Debug.Log("Final Coin Score: " + finalCoins);
        Debug.Log("Final  Score: " + Score);

    }

}
