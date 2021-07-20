using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SpeedManager : MonoBehaviour
{
    public static float speed;
    public float startSpeed;
    void Start()
    {
        speed = startSpeed;
        StartCoroutine("SpeedIncrease");
    }

    IEnumerator SpeedIncrease()
    {
        while (true)
        {
            Debug.Log("Speed: " + speed);
            yield return new WaitForSeconds(15f);
            speed += 1;
        }
    }
}
